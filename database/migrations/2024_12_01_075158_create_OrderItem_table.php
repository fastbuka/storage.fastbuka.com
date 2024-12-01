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
        Schema::create('OrderItem', function (Blueprint $table) {
            $table->increments('id');
            $table->text('uuid')->unique('orderitem_uuid_key');
            $table->text('order_uuid');
            $table->text('food_uuid');
            $table->float('price');
            $table->integer('quantity');
            $table->timestamp('createdAt', 3)->useCurrent();
            $table->timestamp('updatedAt', 3);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('OrderItem');
    }
};
