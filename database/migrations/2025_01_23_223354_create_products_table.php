<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('image')->nullable();
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::table('product_color', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
        }); // Drop foreign key constraints from product_color first

        Schema::dropIfExists('products');
    }
}
