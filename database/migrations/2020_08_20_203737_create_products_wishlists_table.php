<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsWishlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_wishlist', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('wishlist_id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('wishlist_id')->references('id')->on('wishlists');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_wishlists');
    }
}
