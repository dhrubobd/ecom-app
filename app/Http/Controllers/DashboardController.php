<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use Inertia\Inertia;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $totalOrders = Invoice::count();
        $totalRevenue = Invoice::sum('total_amount');
        $totalProducts = Product::count();
        return Inertia::render('Dashboard', [
            'totalOrders' => $totalOrders,
            'totalRevenue' => $totalRevenue,
            'totalProducts' => $totalProducts,
        ]);
    }
}
