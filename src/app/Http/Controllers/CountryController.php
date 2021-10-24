<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Traits\InteractsWithBanner;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Inertia\Response;

class CountryController extends Controller
{
    use InteractsWithBanner;

    public function index(Request $request): Response
    {
        $builder = Country::query();

        if ($request->has('query')) {
            $query = $request->get('query');
            $builder->where('name', 'LIKE', "%${query}%");
        }

        $paginator = $builder->orderBy('id', 'desc')
            ->paginate(config('app.page_size'));

        return Inertia::render('Location/Country/List', [
            'countries' => $paginator
        ]);
    }

    public function search(Request $request): JsonResponse
    {
        $countries = Country::search($request->get('query'), $request->get('current_id'));

        return response()->json($countries);
    }

    public function create(): Response
    {
        return Inertia::render('Location/Country/Create', []);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('countries')],
            'code' => ['required', 'string', 'max:255'],
            'flag_url' => ['max:255', 'url', 'nullable'],
        ]);

        Country::create([
            'slug' => Str::slug($request->get('name')),
            'name' => $request->get('name'),
            'code' => $request->get('code'),
            'flag_url' => $request->get('flag_url'),
        ]);

        $this->banner(sprintf("The country %s is created.", $request->get('name')));

        return $request->wantsJson()
            ? new JsonResponse('', 200)
            : redirect()->route('location.country.list');
    }

    public function edit(Request $request, string $countryId): Response
    {
        $country = Country::findOrFail($countryId);

        return Inertia::render('Location/Country/Edit', [
            'country' => $country,
        ]);
    }

    public function update(Request $request, Country $country)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('countries')->ignore($country->id)],
            'code' => ['required', 'string', 'max:255'],
            'flag_url' => ['max:255', 'url', 'nullable'],
        ]);

        $country->forceFill([
            'slug' => Str::slug($request->input('name')),
            'name' => $request->input('name'),
            'code' => $request->input('code'),
            'flag_url' => $request->input('flag_url'),
        ]);

        if ($country->isDirty()) {
            $country->save();
        }

        return $request->wantsJson()
            ? new JsonResponse('', 200)
            : back();
    }

    public function destroy(Request $request, string $countryId)
    {
        $country = Country::findOrFail($countryId);
        $country->delete();

        $this->banner(sprintf("The country <strong>%s</strong> is deleted.", $country->name));

        return $request->wantsJson()
            ? new JsonResponse('', 200)
            : redirect()->route('location.country.list');
    }
}
