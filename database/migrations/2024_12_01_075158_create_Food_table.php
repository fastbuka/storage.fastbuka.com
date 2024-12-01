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
        Schema::create('Food', function (Blueprint $table) {
            $table->increments('id');
            $table->text('uuid')->unique('food_uuid_key');
            $table->text('vendor_uuid');
            $table->text('category_uuid')->nullable();
            $table->text('name')->nullable();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->float('price')->default(0);
            $table->float('discount')->default(0);
            $table->text('processing_time')->nullable();
            $table->float('ratings')->default(0);
            $table->float('featured')->default(0);
            $table->boolean('ready_made')->default(true);
            $table->boolean('on_menu')->default(true);
            $table->timestamp('createdAt', 3)->useCurrent();
            $table->timestamp('updatedAt', 3);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Food');
    }
};
