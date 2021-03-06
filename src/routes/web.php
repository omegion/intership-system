<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CompanyActivityController;
use App\Http\Controllers\CompanyCategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified', 'role:admin,lecturer,student'])->prefix('company')->name('company.')
    ->group(function () {
        Route::get('/list', [CompanyController::class, 'index'])->name('list');
        Route::get('/add', [CompanyController::class, 'add'])->name('add');
        Route::post('/add', [CompanyController::class, 'store'])->name('store');
        Route::get('/{company:id}/edit', [CompanyController::class, 'edit'])->name('edit');
        Route::put('/{company:id}/edit', [CompanyController::class, 'update'])->name('update');
        Route::delete('/{company:id}/edit', [CompanyController::class, 'destroy'])->name('destroy');
        Route::get('/{company:id}', [CompanyController::class, 'show'])->name('show');
        Route::get('/{company:id}/activities', [CompanyActivityController::class, 'index'])->name('activity.list');

        Route::middleware(['role:admin,lecturer'])->group(function () {
            Route::put('/{company:id}/editVerification', [CompanyController::class, 'updateVerification'])->name('updateVerification');
        });

        // COMPANY CATEGORY
        Route::prefix('category')->name('category.')->group(function () {
            Route::get('/list', [CompanyCategoryController::class, 'index'])->name('list');
            Route::get('/search', [CompanyCategoryController::class, 'search'])->name('search');
            Route::get('/create', [CompanyCategoryController::class, 'create'])->name('create');
            Route::post('/create', [CompanyCategoryController::class, 'store'])->name('store');
            Route::get('/{category:id}/edit', [CompanyCategoryController::class, 'edit'])->name('edit');
            Route::put('/{category:id}/edit', [CompanyCategoryController::class, 'update'])->name('update');
            Route::delete('/{category:id}/edit', [CompanyCategoryController::class, 'destroy'])->name('destroy');
        });
    });

Route::middleware(['auth:sanctum', 'verified', 'role:admin,lecturer,student'])->prefix('internship')->name('internship.')->group
(function () {
    Route::get('/list', [InternshipController::class, 'index'])->name('list');
    Route::get('/{internship:id}', [InternshipController::class, 'show'])->name('show');
    Route::get('/{internship:id}/pdf', [InternshipController::class, 'pdf'])->name('pdf');
    Route::get('/{company:id}/internship-create', [InternshipController::class, 'create'])->name('create');
    Route::post('/{company:id}/internship-create', [InternshipController::class, 'store'])->name('store');
    Route::get('/{internship:id}/edit', [InternshipController::class, 'edit'])->name('edit');
    Route::put('/{internship:id}/edit', [InternshipController::class, 'update'])->name('update');

});

Route::middleware(['auth:sanctum', 'verified', 'role:admin,lecturer'])->prefix('user')->name('user.')->group(function () {
    Route::get('/list', [UserController::class, 'index'])->name('list');
    Route::get('/{user:id}', [UserController::class, 'show'])->name('show');
    Route::get('/{user:id}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('/{user:id}/edit', [UserController::class, 'update'])->name('update');
    Route::put('/{user:id}/editVerification', [UserController::class, 'updateVerification'])->name('updateVerification');
    Route::put('/{user:id}/addRole', [UserController::class, 'addRoleToUser'])->name('addRoleToUser');
    Route::delete('/{user:id}/removeRole', [UserController::class, 'removeRoleFromUser'])->name('removeRoleFromUser');
});

Route::middleware(['auth:sanctum', 'verified', 'role:admin,lecturer,student'])->prefix('location')->name('location.')->group(function () {
    Route::prefix('country')->name('country.')->group(function () {
        Route::get('/list', [CountryController::class, 'index'])->name('list');
        Route::get('/search', [CountryController::class, 'search'])->name('search');

        Route::middleware(['role:admin,lecturer'])->group(function () {
            Route::get('/create', [CountryController::class, 'create'])->name('create');
            Route::post('/create', [CountryController::class, 'store'])->name('store');
            Route::get('/{country:id}/edit', [CountryController::class, 'edit'])->name('edit');
            Route::put('/{country:id}/edit', [CountryController::class, 'update'])->name('update');
            Route::delete('/{country:id}/edit', [CountryController::class, 'destroy'])->name('destroy');
        });
    });
    Route::prefix('city')->name('city.')->group(function () {
        Route::get('/list', [CityController::class, 'index'])->name('list');
        Route::get('/search', [CityController::class, 'search'])->name('search');

        Route::middleware(['role:admin,lecturer'])->group(function () {
            Route::get('/create', [CityController::class, 'create'])->name('create');
            Route::post('/create', [CityController::class, 'store'])->name('store');
            Route::get('/{city:id}/edit', [CityController::class, 'edit'])->name('edit');
            Route::put('/{city:id}/edit', [CityController::class, 'update'])->name('update');
            Route::delete('/{city:id}/edit', [CityController::class, 'destroy'])->name('destroy');
        });
    });
});

Route::middleware(['auth:sanctum', 'verified', 'role:admin'])->prefix('setting')->name('setting.')->group(function () {
    Route::get('/list', [SettingController::class, 'index'])->name('list');
    Route::put('/{setting:id}/edit', [SettingController::class, 'update'])->name('update');
});
