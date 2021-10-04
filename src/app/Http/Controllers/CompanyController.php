<?php

namespace App\Http\Controllers;

use App\Helpers\InteractsWithBanner;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CompanyController extends Controller
{
    use InteractsWithBanner;

    public function index(): Response
    {
        $companies = Company::orderBy('id', 'desc')
            ->paginate(20);


        return Inertia::render('Company/List', [
            'companies' => $companies
        ]);
    }

    public function show(Request $request, string $companyId): Response
    {
        $company = Company::findOrFail($companyId);


        return Inertia::render('Company/Show', [
            'company' => $company
        ]);
    }

    public function add(): Response
    {
        return Inertia::render('Company/Add');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:companies'],
        ]);

        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'creator_user_id' => $request->user()->id,
        ]);

        $this->banner("The company is created.");

        return redirect()->route('company.list');
    }
}
