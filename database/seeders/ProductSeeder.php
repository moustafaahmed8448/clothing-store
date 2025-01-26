<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $category = Category::first(); // Fetch the first category (assuming categories are seeded first)

        // Create 30 products with random data
        $products = [
            ['name' => 'T-shirt Red', 'description' => 'A red T-shirt', 'price' => 19.99],
            ['name' => 'Jeans Blue', 'description' => 'Blue denim jeans', 'price' => 49.99],
            ['name' => 'Jacket Black', 'description' => 'A stylish black jacket', 'price' => 79.99],
            ['name' => 'T-shirt Green', 'description' => 'A green T-shirt', 'price' => 18.99],
            ['name' => 'Sweater Grey', 'description' => 'A comfy grey sweater', 'price' => 39.99],
            ['name' => 'Shorts Khaki', 'description' => 'Khaki shorts for summer', 'price' => 24.99],
            ['name' => 'Hoodie Yellow', 'description' => 'A bright yellow hoodie', 'price' => 59.99],
            ['name' => 'Dress Black', 'description' => 'A sleek black dress', 'price' => 89.99],
            ['name' => 'Skirt Denim', 'description' => 'A classic denim skirt', 'price' => 29.99],
            ['name' => 'Boots Brown', 'description' => 'Stylish brown boots', 'price' => 99.99],
            ['name' => 'Sneakers White', 'description' => 'White sneakers for everyday wear', 'price' => 69.99],
            ['name' => 'T-shirt Blue', 'description' => 'A cool blue T-shirt', 'price' => 19.99],
            ['name' => 'Jeans Black', 'description' => 'Black denim jeans', 'price' => 49.99],
            ['name' => 'Jacket Red', 'description' => 'A red jacket for a bold look', 'price' => 79.99],
            ['name' => 'Sweater Blue', 'description' => 'A cozy blue sweater', 'price' => 39.99],
            ['name' => 'Shorts Red', 'description' => 'Red shorts for hot days', 'price' => 24.99],
            ['name' => 'Hoodie Black', 'description' => 'A classic black hoodie', 'price' => 59.99],
            ['name' => 'Dress White', 'description' => 'A beautiful white dress', 'price' => 89.99],
            ['name' => 'Skirt Black', 'description' => 'A stylish black skirt', 'price' => 29.99],
            ['name' => 'Boots Black', 'description' => 'Fashionable black boots', 'price' => 99.99],
            ['name' => 'Sneakers Black', 'description' => 'Comfortable black sneakers', 'price' => 69.99],
            ['name' => 'T-shirt Purple', 'description' => 'A purple T-shirt', 'price' => 19.99],
            ['name' => 'Jeans White', 'description' => 'White denim jeans', 'price' => 49.99],
            ['name' => 'Jacket Grey', 'description' => 'A grey jacket for casual wear', 'price' => 79.99],
            ['name' => 'Sweater Green', 'description' => 'A green sweater for the winter', 'price' => 39.99],
            ['name' => 'Shorts Blue', 'description' => 'Cool blue shorts for summer', 'price' => 24.99],
            ['name' => 'Hoodie Grey', 'description' => 'A cozy grey hoodie', 'price' => 59.99],
            ['name' => 'Dress Red', 'description' => 'A red dress for special occasions', 'price' => 89.99],
            ['name' => 'Skirt Red', 'description' => 'A beautiful red skirt', 'price' => 29.99],
        ];

        foreach ($products as $productData) {
            $product = Product::create([
                'name' => $productData['name'],
                'description' => $productData['description'],
                'price' => $productData['price'],
                'category_id' => $category->id,
            ]);
            
            // Attach colors (random selection)
            $colors = [1, 2, 3, 4, 5]; // Assuming these are color IDs in your colors table
            $product->colors()->attach(array_rand(array_flip($colors), 2)); // Attach two random colors

            // Attach sizes (random selection)
            $sizes = [1, 2, 3, 4]; // Assuming these are size IDs in your sizes table
            $product->sizes()->attach(array_rand(array_flip($sizes), 2)); // Attach two random sizes
        }
    }
}
