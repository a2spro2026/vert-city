<?php

use App\Http\Controllers\Admin\ConstructionSiteController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicSiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicSiteController::class, 'home'])->name('home');
Route::get('/projets-neufs', [PublicSiteController::class, 'newProjects'])->name('public.projects.new');
Route::get('/chantiers-en-cours', [PublicSiteController::class, 'constructionSites'])->name('public.projects.construction');
Route::get('/chantiers/{constructionSite:slug}', [PublicSiteController::class, 'showConstructionSite'])->name('public.construction-sites.show');
Route::get('/projets/{project:slug}', [PublicSiteController::class, 'show'])->name('public.projects.show');

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'create'])->name('login');
    Route::post('/admin/login', [AuthController::class, 'store'])
        ->middleware('throttle:5,1')
        ->name('login.store');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'active'])->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');

    foreach ([
        'fournisseurs' => 'Fournisseurs',
        'facturation' => 'Facturation',
        'charges' => 'Charges',
        'configuration' => 'Configuration',
    ] as $route => $title) {
        Route::get("/{$route}", fn () => view('admin.coming-soon', compact('title')))
            ->name($route);
    }

    Route::resource('projets', ProjectController::class)
        ->parameters(['projets' => 'project'])
        ->except('show');
    Route::resource('chantiers', ConstructionSiteController::class)
        ->parameters(['chantiers' => 'constructionSite'])
        ->except('show');
    Route::post('/deconnexion', [AuthController::class, 'destroy'])->name('logout');
});
