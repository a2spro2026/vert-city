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

    $comingSoon = [
        'fournisseurs/fiches' => ['fournisseurs.fiches', 'Fiche Fournisseur'],
        'fournisseurs/bons-achats' => ['fournisseurs.bons-achats', 'Bon Achats'],
        'fournisseurs/bons-commande' => ['fournisseurs.bons-commande', 'Bon de Commande'],
        'fournisseurs/reglements-achats' => ['fournisseurs.reglements', 'Règlement Achats'],
        'fournisseurs/balance' => ['fournisseurs.balance', 'Balance Fournisseurs'],
        'fournisseurs/releve-compte' => ['fournisseurs.releve', 'Relevé Compte'],
        'stock/produits' => ['stock.produits', 'Fiche Produit'],
        'stock/mouvements' => ['stock.mouvements', 'Mouvement Stock'],
        'stock/fiscal' => ['stock.fiscal', 'Stock Fiscale'],
        'facturation/depot-a' => ['facturation.depot-a', 'Dépôt A'],
        'facturation/depot-b' => ['facturation.depot-b', 'Dépôt B'],
        'facturation/depot-c' => ['facturation.depot-c', 'Dépôt C'],
        'facturation/factures-ventes' => ['facturation.factures-ventes', 'Facture Ventes'],
        'facturation/reglements' => ['facturation.reglements', 'Règlements Factures Ventes'],
        'facturation/balance' => ['facturation.balance', 'Balance Facturation'],
        'chantiers/devis' => ['chantiers.devis', 'Devis'],
        'chantiers/bons-execution' => ['chantiers.bons-execution', "Bon d'exécution"],
        'chantiers/suivi-depenses' => ['chantiers.suivi-depenses', 'Suivi Dépenses'],
        'personnel/fiches' => ['personnel.fiches', 'Fiche Personnel'],
        'personnel/etat-paiement' => ['personnel.etat-paiement', 'État Paiement'],
        'monetaire/transactions' => ['monetaire.transactions', 'Transaction et Charges'],
        'monetaire/charges' => ['monetaire.charges', 'Charge'],
        'monetaire/salaires' => ['monetaire.salaires', 'Salaire'],
        'monetaire/tresorerie' => ['monetaire.tresorerie', 'Trésorerie'],
        'configuration/utilisateurs' => ['configuration.utilisateurs', 'Utilisateur'],
        'configuration/parametres' => ['configuration.parametres', 'Paramètres'],
    ];

    foreach ($comingSoon as $uri => [$name, $title]) {
        Route::get($uri, fn () => view('admin.coming-soon', ['title' => $title]))->name($name);
    }

    Route::resource('projets', ProjectController::class)
        ->parameters(['projets' => 'project'])
        ->except('show');
    Route::resource('chantiers', ConstructionSiteController::class)
        ->parameters(['chantiers' => 'constructionSite'])
        ->except('show');
    Route::post('/deconnexion', [AuthController::class, 'destroy'])->name('logout');
});
