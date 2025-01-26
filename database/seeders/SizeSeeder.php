<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    public function run()
    {
        Size::create(['name' => 'Small']);
        Size::create(['name' => 'Medium']);
        Size::create(['name' => 'Large']);
        Size::create(['name' => 'X-Large']);
        Size::create(['name' => 'XX-Large']);
        Size::create(['name' => '3X-Large']);
        Size::create(['name' => '4X-Large']);
        Size::create(['name' => '5X-Large']);
        Size::create(['name' => 'Youth Small']);
        Size::create(['name' => 'Youth Medium']);
        Size::create(['name' => 'Youth Large']);
        Size::create(['name' => 'Petite']);
        Size::create(['name' => 'Plus Size']);
        Size::create(['name' => 'One Size']);
        Size::create(['name' => 'XS']);
    }
}
