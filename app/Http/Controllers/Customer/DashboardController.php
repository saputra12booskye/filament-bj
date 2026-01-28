<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $customer = auth('customer')->user();

        $totalOrders = Order::where('customer_id', $customer->id)->count();

        $lastOrder = Order::where('customer_id', $customer->id)
            ->latest()
            ->first();

        return view('customer.dashboard', [
            'customer' => $customer,
            'totalOrders' => $totalOrders,
            'lastOrder' => $lastOrder,
        ]);
    }
}
