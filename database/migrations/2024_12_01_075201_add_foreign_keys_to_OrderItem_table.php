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
        Schema::table('OrderItem', function (Blueprint $table) {
            $table->foreign(['food_uuid'], 'OrderItem_food_uuid_fkey')->references(['uuid'])->on('Food')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign(['order_uuid'], 'OrderItem_order_uuid_fkey')->references(['uuid'])->on('Order')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('OrderItem', function (Blueprint $table) {
            $table->dropForeign('OrderItem_food_uuid_fkey');
            $table->dropForeign('OrderItem_order_uuid_fkey');
        });
    }
};
