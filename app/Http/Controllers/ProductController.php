<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all products from the database
        $products = Product::all();

        // Pass the products data to the view
        return view('home', compact('products'));
    }


    /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Fetch all categories to populate a dropdown in the form
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Handle file upload for image (if any)
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        } else {
            $imagePath = null;
        }

        // Create the product
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'category_id' => $request->category_id,
        ]);

        // Redirect to the products list with a success message
        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // Fetch all categories for the dropdown
        $categories = Category::all();

        // Pass the product and categories to the edit view
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Handle file upload for image (if any)
        if ($request->hasFile('image')) {
            // Delete old image
            if ($product->image) {
                \Storage::delete('public/' . $product->image);
            }

            // Store new image
            $imagePath = $request->file('image')->store('products', 'public');
        } else {
            // Keep the old image if not updated
            $imagePath = $product->image;
        }

        // Update the product
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'category_id' => $request->category_id,
        ]);

        // Redirect to the products list with a success message
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // Delete the product's image from storage if it exists
        if ($product->image) {
            \Storage::delete('public/' . $product->image);
        }

        // Delete the product
        $product->delete();

        // Redirect to the products list with a success message
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }

    public function show($id)
{
    // Find the product by its ID
    $product = Product::findOrFail($id);

    // Pass the product data to the view
    return view('products.show', compact('product'));
}

}
