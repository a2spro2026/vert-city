<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $zero = number_format(0, 2, ',', ' ');

        return view('admin.dashboard', [
            'kpis' => [
                [
                    'label' => 'Total Achats',
                    'value' => $zero,
                    'gradient' => 'from-[#1e3a4c] via-[#153827] to-[#0a1622]',
                    'icon' => 'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z',
                ],
                [
                    'label' => 'Total Ventes',
                    'value' => $zero,
                    'gradient' => 'from-amber-400 via-orange-500 to-[#8a4b12]',
                    'icon' => 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z',
                ],
                [
                    'label' => 'Reliquat',
                    'value' => $zero,
                    'gradient' => 'from-[#b8dc79] via-[#79a84c] to-[#2f6b4a]',
                    'icon' => 'M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3',
                ],
                [
                    'label' => 'Total Charges',
                    'value' => $zero,
                    'gradient' => 'from-teal-500 via-emerald-700 to-[#10281d]',
                    'icon' => 'M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z',
                ],
                [
                    'label' => 'Solde Fournisseur',
                    'value' => $zero,
                    'gradient' => 'from-[#5f7f3f] via-[#376127] to-[#153827]',
                    'icon' => 'M8 17a2 2 0 11-4 0 2 2 0 014 0zM20 17a2 2 0 11-4 0 2 2 0 014 0zM12 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10h9m0 0h7',
                ],
            ],
            'tables' => [
                'bons_achats' => [],
                'bons_ventes' => [],
                'bons_charges' => [],
                'reglements' => [],
            ],
        ]);
    }
}
