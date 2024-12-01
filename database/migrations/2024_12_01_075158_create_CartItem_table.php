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
        Schema::create('CartItem', function (Blueprint $table) {
            $table->increments('id');
            $table->text('uuid')->unique('cartitem_uuid_key');
            $table->text('cart_uuid');
            $table->text('food_uuid');
            $table->integer('quantity');
            $table->timestamp('createdAt', 3)->useCurrent();
            $table->timestamp('updatedAt', 3);
            $table->float('price')->default(0);

            $table->unique(['cart_uuid', 'food_uuid'], 'cartitem_cart_uuid_food_uuid_key');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CartItem');
    }
};
