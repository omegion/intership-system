<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Internship;
use App\Models\Setting;
use App\Traits\InteractsWithBanner;
use App\Traits\QueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\QueryBuilder\AllowedFilter;

class InternshipController extends Controller
{
    use InteractsWithBanner;
    use QueryBuilder;

    public function index(Request $request): Response
    {

        $paginator = Internship::builder()
            ->allowedFilters([
                AllowedFilter::exact('verified_at')->ignore(null),
                AllowedFilter::exact('education_year')
            ])
            ->allowedSorts('created_at', 'verified_at');

        if (QueryBuilder::isSortable()) {
            $paginator->defaultSort(QueryBuilder::getSort());
        }

        $paginator = $paginator->with('user', 'company', 'country', 'city')
            ->paginate(Setting::get('system.pagination-page-size', 10))
            ->appends($request->query());

        return Inertia::render('Internship/List', [
            'internships' => $paginator
        ]);
    }

    public function create(Request $request, Company $company): Response
    {
        $initialCountries = Country::search('', $company->country_id);
        $initialCities = City::search('', $company->city_id);

        return Inertia::render('Company/Internship/Create', [
            'company' => $company,
            'initialCountries' => $initialCountries,
            'initialCities' => $initialCities,
        ]);
    }

    public function store(Request $request, Company $company): RedirectResponse
    {
        $request->validate([
            'starts_at' => ['required', 'date'],
            'ends_at' => ['required', 'date'],
            'education_year' => ['required', 'integer'],
            'country_id' => ['required', 'integer'],
            'city_id' => ['required', 'integer'],
        ]);

        $internship = new Internship();
        $internship->setRandomCode();
        $internship->fill([
            'starts_at' => $request->get('starts_at'),
            'ends_at' => $request->get('ends_at'),
            'education_year' => $request->get('education_year'),
            'country_id' => $request->get('country_id'),
            'city_id' => $request->get('city_id'),
            'company_id' => $company->id,
            'user_id' => $request->user()->id,
        ])->save();

        $this->banner("The internship is created.");

        return redirect()->route('company.show', ['company' => $company->id]);
    }

    public function show(Request $request, string $internshipId): Response
    {
        $internship = Internship::with('user', 'company', 'country', 'city')->findOrFail($internshipId);

        return Inertia::render('Internship/Show', [
            'internship' => $internship
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Internship $internship
     * @return \Illuminate\Http\Response
     */
    public function edit(Internship $internship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Internship $internship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Internship $internship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Internship $internship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Internship $internship)
    {
        //
    }

    public function pdf(Request $request, Internship $internship)
    {

    }

}
