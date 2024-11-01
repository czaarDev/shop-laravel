<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\View\View;

class HomeController
{
    public function index(): View
    {
        $usersCount    = User::count();
        $productsCount = Product::count();
        $ordersCount   = Order::count();
        $ordersPerDay  = Order::query()
            ->selectRaw("(DATE_FORMAT(created_at, '%d/%m/%Y')) as formattedDate, COUNT(id) as quantity")
            ->groupByRaw("DATE_FORMAT(created_at, '%d/%m/%Y')")
            ->get();

        return view('home', compact(
            'usersCount',
            'productsCount',
            'ordersCount',
            'ordersPerDay'
        ));
    }
}
