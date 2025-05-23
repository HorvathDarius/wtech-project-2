<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_visible_name');
            $table->string('product_link_name');
            $table->float('product_price');
            $table->enum('product_category', ['guitar', "bass", "amp"]);
            $table->enum('product_color', ['red', "blue", "black"]);
            $table->integer('quantity');
            $table->string('product_description');
            $table->string('product_image')->nullable();
            $table->string('product_image_second')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
