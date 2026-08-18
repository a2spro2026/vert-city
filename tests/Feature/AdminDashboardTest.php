<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_shows_analytic_cards_and_four_tables(): void
    {
        $admin = User::factory()->create();

        $this->actingAs($admin)
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('Cartes Analytiques')
            ->assertSee('Total Achats')
            ->assertSee('Total Ventes')
            ->assertSee('Reliquat')
            ->assertSee('Total Charges')
            ->assertSee('Solde Fournisseur')
            ->assertSee('5 Derniers Bons Achats')
            ->assertSee('5 Derniers Bons Ventes')
            ->assertSee('5 Derniers Bon Charge')
            ->assertSee('5 Régl à Décaisser')
            ->assertSee('Fournisseur')
            ->assertSee('Stock')
            ->assertSee('Facturation')
            ->assertSee('Chantiers')
            ->assertSee('Suivi Monétaire')
            ->assertSee('Personnel')
            ->assertSee('Projets')
            ->assertSee('Configuration');
    }

    public function test_coming_soon_modules_are_reachable(): void
    {
        $admin = User::factory()->create();

        $this->actingAs($admin)
            ->get(route('admin.fournisseurs.fiches'))
            ->assertOk()
            ->assertSee('Fiche Fournisseur');

        $this->actingAs($admin)
            ->get(route('admin.stock.produits'))
            ->assertOk()
            ->assertSee('Fiche Produit');

        $this->actingAs($admin)
            ->get(route('admin.personnel.fiches'))
            ->assertOk()
            ->assertSee('Fiche Personnel');
    }
}
