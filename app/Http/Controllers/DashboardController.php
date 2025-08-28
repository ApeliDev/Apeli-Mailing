<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    /**
     * Show the email templates dashboard
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $templates = [
            [
                'id' => 'purchase-confirmation',
                'name' => 'Purchase Confirmation',
                'description' => 'Send confirmation for German Duss 12lbs Stove purchase',
                'route' => route('email.form', ['type' => 'purchase-confirmation']),
                'icon' => 'fas fa-shopping-cart'
            ],
            // Add more templates here as needed
        ];

        return view('dashboard', compact('templates'));
    }
}
