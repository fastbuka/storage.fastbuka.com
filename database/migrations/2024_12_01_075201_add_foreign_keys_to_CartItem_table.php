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
        Schema::table('CartItem', function (Blueprint $table) {
            $table->foreign(['cart_uuid'], 'CartItem_cart_uuid_fkey')->references(['uuid'])->on('Cart')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign(['food_uuid'], 'CartItem_food_uuid_fkey')->references(['uuid'])->on('Food')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('CartItem', function (Blueprint $table) {
            $table->dropForeign('CartItem_cart_uuid_fkey');
            $table->dropForeign('CartItem_food_uuid_fkey');
        });
    }
};
