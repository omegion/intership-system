<?php

namespace App\Http\Controllers;

use App\Events\CompanyCreated;
use App\Events\CompanyUnverified;
use App\Events\CompanyUpdated;
use App\Events\CompanyVerified;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Traits\InteractsWithBanner;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $company = Company::findOrFail($companyId);

        return Inertia::render('Company/Show', [
            'company' => $company
        ]);
    }

    public function edit(Request $request, string $companyId): Response
    {
        $company = Company::findOrFail($companyId);
        $initialCountries = Country::search('', $company->country_id);
        $initialCities = City::search('', $company->city_id);

        return Inertia::render('Company/Edit', [
            'company' => $company,
            'initialCountries' => $initialCountries,
            'initialCities' => $initialCities,
        ]);
    }

    public function update(Request $request, string $companyId)
    {
        $company = Company::findOrFail($companyId);

        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($company->id)],
            'country_id' => ['required', 'integer'],
            'city_id' => ['required', 'integer'],
        ])->validateWithBag('updateCompanyInformation');

        $company->forceFill([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'country_id' => $request->input('country_id'),
            'city_id' => $request->input('city_id'),
        ]);

        if ($company->isDirty()) {
            if ($request->user()->hasRole('student') && $company->verified_at != null) {
                $company->forceFill(['verified_at' => null]);
                CompanyUnverified::dispatch($company, $request->user());
            }

            $company->save();
            CompanyUpdated::dispatch($company, $request->user());
        }

        return $request->wantsJson()
            ? new JsonResponse('', 200)
            : back();
    }


    public function updateVerification(Request $request, string $companyId)
    {
        $company = Company::findOrFail($companyId);

        Validator::make($request->all(), [
            'verified_at' => ['nullable', 'date'],
        ])->validateWithBag('updateCompanyVerificationInformation');

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

        return Inertia::render('Company/Add', [
            'initialCountries' => $initialCountries,
            'initialCities' => $initialCities,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:companies'],
            'country_id' => ['required', 'integer'],
            'city_id' => ['required', 'integer'],
        ]);

        $company = Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'creator_user_id' => $request->user()->id,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
        ]);

        CompanyCreated::dispatch($company, $request->user());

        $this->banner("The company is created.");

        return redirect()->route('company.list');
    }
}
