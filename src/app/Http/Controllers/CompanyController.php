<?php

namespace App\Http\Controllers;

use App\Events\CompanyCreated;
use App\Events\CompanyUnverified;
use App\Events\CompanyUpdated;
use App\Events\CompanyVerified;
use App\Models\City;
use App\Models\Company;
use App\Models\CompanyCategory;
use App\Models\Country;
use App\Models\Setting;
use App\Traits\InteractsWithBanner;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Inertia\Response;

class CompanyController extends Controller
{
    use InteractsWithBanner;

    public function index(): Response
    {
        $paginator = Company::with('country', 'city')->orderBy('id', 'desc')
            ->paginate(config('app.page_size'));

        $paginator->setCollection($paginator->getCollection()->makeHidden(['activities']));

        return Inertia::render('Company/List', [
            'companies' => $paginator
        ]);
    }

    public function show(Request $request, string $companyId): Response
    {
        $company = Company::with('country', 'city', 'categories')->findOrFail($companyId);

        return Inertia::render('Company/Show', [
            'company' => $company
        ]);
    }

    public function edit(Request $request, string $companyId): Response
    {
        $company = Company::with('categories')->findOrFail($companyId);
        $initialCountries = Country::search('', $company->country_id);
        $initialCities = City::search('', $company->city_id);
        $initialCategories = CompanyCategory::search('', $company->category_ids->toArray());

        return Inertia::render('Company/Edit', [
            'company' => $company,
            'initialCountries' => $initialCountries,
            'initialCities' => $initialCities,
            'initialCategories' => $initialCategories,
        ]);
    }

    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($company->id)],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'country_id' => ['required', 'integer'],
            'city_id' => ['required', 'integer'],
        ]);

        $company->forceFill([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'country_id' => $request->input('country_id'),
            'city_id' => $request->input('city_id'),
        ]);

        if ($company->isDirty()) {
            if ($request->user()->hasRole('student') && $company->verified_at != null && Setting::get('company.require-verification-after-update', true)) {
                $company->forceFill(['verified_at' => null]);
                CompanyUnverified::dispatch($company, $request->user());
            }

            $company->save();
            CompanyUpdated::dispatch($company, $request->user());
        }

        $company->categories()->sync($request->input('categories'));

        return $request->wantsJson()
            ? new JsonResponse('', 200)
            : back();
    }


    public function updateVerification(Request $request, Company $company)
    {
        $request->validate([
            'verified_at' => ['nullable', 'date'],
        ]);

        $company->forceFill([
            'verified_at' => $request->input('verified_at'),
        ]);

        if ($company->isDirty()) {
            $company->save();

            if ($company->verified_at !== null) {
                CompanyVerified::dispatch($company, $request->user());
            } else {
                CompanyUnverified::dispatch($company, $request->user());
            }
        }

        return $request->wantsJson()
            ? new JsonResponse('', 200)
            : back();
    }

    public function add(): Response
    {
        $initialCountries = Country::search();
        $initialCities = City::search();
        $initialCategories = CompanyCategory::search();

        return Inertia::render('Company/Add', [
            'initialCountries' => $initialCountries,
            'initialCities' => $initialCities,
            'initialCategories' => $initialCategories,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'country_id' => ['required', 'integer'],
            'city_id' => ['required', 'integer'],
        ]);

        $company = Company::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'creator_user_id' => $request->user()->id,
            'country_id' => $request->get('country_id'),
            'city_id' => $request->get('city_id'),
        ]);

        if ($request->get('categories')) {
            $company->categories()->sync($request->get('categories'));
        }

        CompanyCreated::dispatch($company, $request->user());

        $this->banner("The company is created.");

        return redirect()->route('company.list');
    }


    public function destroy(Request $request, Company $company)
    {
        $company->delete();

        $this->banner(sprintf("The company <strong>%s</strong> is deleted.", $company->name));

        return $request->wantsJson()
            ? new JsonResponse('', 200)
            : redirect()->route('company.list');
    }
}
