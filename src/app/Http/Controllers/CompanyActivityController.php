<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CompanyActivityController extends Controller
{
    public function index(Request $request, string $companyId): Response
    {
        $company = Company::findOrFail($companyId);

        $activities = $company->activities()->with('user')->orderBy('id', 'desc')
            ->paginate(config('app.page_size'));


        return Inertia::render('Company/Activity/List', [
            'company' => $company,
            'activities' => $activities
        ]);
    }
}
