<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorSeeder extends Seeder
{
    public function run()
    {
        Color::create(['name' => 'Red', 'hex_code' => '#ff0000']);
        Color::create(['name' => 'Blue', 'hex_code' => '#0000ff']);
        Color::create(['name' => 'Black', 'hex_code' => '#000000']);
        Color::create(['name' => 'White', 'hex_code' => '#ffffff']);
        Color::create(['name' => 'Green', 'hex_code' => '#00ff00']);
        Color::create(['name' => 'Yellow', 'hex_code' => '#ffff00']);
        Color::create(['name' => 'Orange', 'hex_code' => '#ffa500']);
        Color::create(['name' => 'Pink', 'hex_code' => '#ffc0cb']);
        Color::create(['name' => 'Purple', 'hex_code' => '#800080']);
        Color::create(['name' => 'Gray', 'hex_code' => '#808080']);
        Color::create(['name' => 'Brown', 'hex_code' => '#a52a2a']);
        Color::create(['name' => 'Cyan', 'hex_code' => '#00ffff']);
        Color::create(['name' => 'Magenta', 'hex_code' => '#ff00ff']);
        Color::create(['name' => 'Lime', 'hex_code' => '#00ff00']);
        Color::create(['name' => 'Maroon', 'hex_code' => '#800000']);
        Color::create(['name' => 'Navy', 'hex_code' => '#000080']);
        Color::create(['name' => 'Teal', 'hex_code' => '#008080']);
        Color::create(['name' => 'Olive', 'hex_code' => '#808000']);
        Color::create(['name' => 'Gold', 'hex_code' => '#ffd700']);
        Color::create(['name' => 'Silver', 'hex_code' => '#c0c0c0']);
        Color::create(['name' => 'Beige', 'hex_code' => '#f5f5dc']);
        Color::create(['name' => 'Ivory', 'hex_code' => '#fffff0']);
        Color::create(['name' => 'Coral', 'hex_code' => '#ff7f50']);
        Color::create(['name' => 'Turquoise', 'hex_code' => '#40e0d0']);
        Color::create(['name' => 'Indigo', 'hex_code' => '#4b0082']);
        Color::create(['name' => 'Violet', 'hex_code' => '#ee82ee']);
        Color::create(['name' => 'Lavender', 'hex_code' => '#e6e6fa']);
        Color::create(['name' => 'Crimson', 'hex_code' => '#dc143c']);
        Color::create(['name' => 'Mint', 'hex_code' => '#98ff98']);
        Color::create(['name' => 'Peach', 'hex_code' => '#ffdab9']);
    }
}