<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Setting;
use App\Traits\InteractsWithBanner;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Inertia\Response;

class CityController extends Controller
{
    use InteractsWithBanner;

    public function index(Request $request): Response
    {
        $builder = City::query();

        if ($request->has('query')) {
            $query = $request->get('query');
            $builder->where('name', 'LIKE', "%${query}%");
        }

        $paginator = $builder->orderBy('id', 'desc')
            ->paginate(Setting::get('system.pagination-page-size', 10));

        return Inertia::render('Location/City/List', [
            'cities' => $paginator
        ]);
    }

    public function search(Request $request): JsonResponse
    {
        $countries = City::search($request->get('query'), $request->get('current_id'));

        return response()->json($countries);
    }

    public function create(): Response
    {
        return Inertia::render('Location/City/Create', []);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('cities')],
        ]);

        City::create([
            'slug' => Str::slug($request->get('name')),
            'name' => $request->get('name'),
        ]);

        $this->banner(sprintf("The city %s is created.", $request->get('name')));

        return $request->wantsJson()
            ? new JsonResponse('', 200)
            : redirect()->route('location.city.list');
    }


    public function edit(Request $request, string $cityId): Response
    {
        $city = City::findOrFail($cityId);

        return Inertia::render('Location/City/Edit', [
            'city' => $city,
        ]);
    }

    public function update(Request $request, City $city)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('cities')->ignore($city->id)],
        ]);

        $city->forceFill([
            'slug' => Str::slug($request->input('name')),
            'name' => $request->input('name'),
        ])->save();

        return $request->wantsJson()
            ? new JsonResponse('', 200)
            : back();
    }

    public function destroy(Request $request, City $city)
    {
        $city->delete();

        $this->banner(sprintf("The city <strong>%s</strong> is deleted.", $city->name));

        return $request->wantsJson()
            ? new JsonResponse('', 200)
            : redirect()->route('location.city.list');
    }
}
