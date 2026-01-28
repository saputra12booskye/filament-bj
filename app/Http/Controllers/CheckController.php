<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function index()
    {
        return view('checkout.index');
    }

    public function store(Request $request)
    {
        $customer = auth('customer')->user();

        // Create a new order
        Order::create([
            'id_customer' => $customer->id,
            'order_code' => 'ORD-'. time(),
            'total_price' => $request->input('total_price'),
            'status' => 'pending',
        ]);

        // Redirect to a confirmation page or back to checkout with success message
        return redirect()->route('checkout.index')->with('success', 'Order placed successfully!');
    }
}
