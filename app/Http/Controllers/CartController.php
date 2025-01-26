<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // View Cart
    public function index()
    {
        $cart = session()->get('cart', []); // Retrieve the cart from session
        return view('cart.index', compact('cart')); // Pass the cart to the view
    }

    // Add Item to Cart
    public function add(Request $request)
    {
        // Retrieve the cart from session or initialize an empty array
        $cart = session()->get('cart', []);
    
        // Generate a unique key for the cart based on product ID, size ID, and color ID
        $productKey = $request->input('product_id') . '-' . $request->input('size_id') . '-' . $request->input('color_id');
    
        // Retrieve the product
        $product = Product::find($request->input('product_id'));
    
        // Validate product existence
        if (!$product) {
            return redirect()->back()->withErrors('Invalid product selection.');
        }
    
        // Retrieve size from product_size table (pivot relationship)
        $size = $product->sizes()->where('sizes.id', $request->input('size_id'))->first();
    
        // Validate size existence
        if (!$size) {
            return redirect()->back()->withErrors('Invalid size selection for the selected product.');
        }
    
        // Retrieve color from color_product table (pivot relationship)
        $color = $product->colors()->where('colors.id', $request->input('color_id'))->first();
    
        // Validate color existence
        if (!$color) {
            return redirect()->back()->withErrors('Invalid color selection for the selected product.');
        }
    
        // If the product, size, and color combination already exists in the cart, update the quantity
        if (isset($cart[$productKey])) {
            $cart[$productKey]['quantity'] += $request->input('quantity');
        } else {
            // Add a new product entry to the cart
            $cart[$productKey] = [
                'id' => $product->id,
                'name' => $product->name,
                'size' => $size->name, // Store the size name
                'color' => $color->name, // Store the color name
                'price' => $product->price,
                'quantity' => $request->input('quantity'),
            ];
        }
    
        // Save the updated cart back to the session
        session()->put('cart', $cart);
    
        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully.');
    }
    

    

    // Update Item in Cart
    public function update(Request $request)
{
    // Validate the request
    $request->validate([
        'product_key' => 'required|string',
        'quantity' => 'required|integer|min:1',
    ]);

    // Get the cart from session
    $cart = session()->get('cart', []);

    // Get the product key and quantity from the request
    $productKey = $request->input('product_key');
    $quantity = $request->input('quantity');

    // Check if the item exists in the cart
    if (isset($cart[$productKey])) {
        // Update the quantity
        $cart[$productKey]['quantity'] = $quantity;

        // Save the updated cart to the session
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
    }

    return redirect()->route('cart.index')->withErrors('Item not found in the cart.');
}

    // Remove Item from Cart
    public function remove(Request $request)
    {
        // Validate the request
        $request->validate([
            'product_key' => 'required|string',
        ]);

        // Get the cart from session
        $cart = session()->get('cart', []);

        // Remove the item from the cart
        $productKey = $request->input('product_key');
        if (isset($cart[$productKey])) {
            unset($cart[$productKey]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Item removed successfully.');
    }

    // Clear the Cart
    public function clear()
    {
        // Clear the cart from the session
        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Cart cleared successfully.');
    }
}
