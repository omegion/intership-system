<?php

namespace App\Http\Controllers;

use App\Models\CompanyCategory;
use App\Models\Setting;
use App\Traits\InteractsWithBanner;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Inertia\Response;

class CompanyCategoryController extends Controller
{
    use InteractsWithBanner;

    public function index(Request $request): Response
    {
        $builder = CompanyCategory::query();

        if ($request->has('query')) {
            $query = $request->get('query');
            $builder->where('name', 'LIKE', "%${query}%");
        }

        $paginator = $builder->orderBy('id', 'desc')
            ->paginate(Setting::get('system.pagination-page-size', 10));

        return Inertia::render('Company/Category/List', [
            'categories' => $paginator
        ]);
    }

    public function search(Request $request): JsonResponse
    {
        $countries = CompanyCategory::search($request->get('query'));

        return response()->json($countries);
    }

    public function create(): Response
    {
        return Inertia::render('Company/Category/Create', []);
    }

    public function store(Request $request)
    {
        $request['slug'] = Str::slug($request->get('name'));

        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('company_categories')],
            'slug' => [Rule::unique('company_categories')],
        ]);

        CompanyCategory::create([
            'slug' => Str::slug($request->get('name')),
            'name' => $request->get('name'),
        ]);

        $this->banner(sprintf("The category %s is created.", $request->get('name')));

        return $request->wantsJson()
            ? new JsonResponse('', 200)
            : redirect()->route('company.category.list');
    }


    public function edit(Request $request, CompanyCategory $category): Response
    {
        return Inertia::render('Company/Category/Edit', [
            'category' => $category,
        ]);
    }

    public function update(Request $request, CompanyCategory $category)
    {
        $request['slug'] = Str::slug($request->get('name'));

        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('cities')->ignore($category->id)],
            'slug' => [Rule::unique('company_categories')->ignore($category->id)],
        ]);

        $category->forceFill([
            'slug' => Str::slug($request->input('name')),
            'name' => $request->input('name'),
        ])->save();

        return $request->wantsJson()
            ? new JsonResponse('', 200)
            : back();
    }

    public function destroy(Request $request, CompanyCategory $category)
    {
        $category->delete();

        $this->banner(sprintf("The city <strong>%s</strong> is deleted.", $category->name));

        return $request->wantsJson()
            ? new JsonResponse('', 200)
            : redirect()->route('company.category.list');
    }
}
