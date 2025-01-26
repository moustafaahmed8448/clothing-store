<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'T-Shirts']);
        Category::create(['name' => 'Jeans']);
        Category::create(['name' => 'Jackets']);
        Category::create(['name' => 'Accessories']);
        Category::create(['name' => 'Sweaters']);
        Category::create(['name' => 'Shorts']);
        Category::create(['name' => 'Hoodies']);
        Category::create(['name' => 'Dresses']);
        Category::create(['name' => 'Skirts']);
        Category::create(['name' => 'Shoes']);
        Category::create(['name' => 'Bags']);
        Category::create(['name' => 'Belts']);
        Category::create(['name' => 'Socks']);
        Category::create(['name' => 'Hats']);
        Category::create(['name' => 'Gloves']);
        Category::create(['name' => 'Scarves']);
        Category::create(['name' => 'Swimwear']);
        Category::create(['name' => 'Activewear']);
        Category::create(['name' => 'Loungewear']);
        Category::create(['name' => 'Boots']);
        Category::create(['name' => 'Sneakers']);
        Category::create(['name' => 'Formalwear']);
        Category::create(['name' => 'Sportswear']);
        Category::create(['name' => 'Outerwear']);
        Category::create(['name' => 'Sleepwear']);
        Category::create(['name' => 'Cardigans']);
        Category::create(['name' => 'Blazers']);
        Category::create(['name' => 'Sweatpants']);
    }
}
