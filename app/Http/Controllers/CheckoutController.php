<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;
    
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
    
        return view('checkout.index', compact('total'));
    }

    public function store(Request $request)
    {
        // Validate checkout form
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        // Calculate the total cart value
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // Create the order
        $order = Order::create([
            'customer_name' => $request->customer_name,
            'address' => $request->address,
            'total' => $total,
        ]);

        // Clear the cart
        session()->forget('cart');

        return redirect()->route('home')->with('success', 'Order placed successfully!');
    }
}
