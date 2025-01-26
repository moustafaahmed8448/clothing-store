<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Allow mass assignment for these fields.
     */
    protected $fillable = ['name', 'description', 'price', 'image'];

    /**
     * Define the relationship with the Category model.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Define the relationship with the Size model (assuming sizes are stored in a separate table).
     */
    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }

    /**
     * Define the relationship with the Color model (assuming colors are stored in a separate table).
     */
    public function colors()
    {
        return $this->belongsToMany(Color::class, 'color_product', 'product_id', 'color_id');
    }
}
