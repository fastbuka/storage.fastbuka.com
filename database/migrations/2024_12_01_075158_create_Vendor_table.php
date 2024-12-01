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
        Schema::create('Vendor', function (Blueprint $table) {
            $table->increments('id');
            $table->text('uuid')->unique('vendor_uuid_key');
            $table->text('slug')->nullable()->unique('vendor_slug_key');
            $table->text('user_uuid');
            $table->text('name')->nullable();
            $table->text('description')->nullable();
            $table->text('profile')->nullable();
            $table->text('cover')->nullable();
            $table->text('country')->nullable();
            $table->text('state')->nullable();
            $table->text('city')->nullable();
            $table->text('location')->nullable();
            $table->text('longitude')->nullable();
            $table->text('latitude')->nullable();
            $table->text('address')->nullable();
            $table->float('ratings')->default(0);
            $table->float('featured')->default(0);
            $table->text('status')->default('pending');
            $table->boolean('is_online')->default(true);
            $table->text('category')->nullable();
            $table->text('opening_time')->nullable();
            $table->text('closing_time')->nullable();
            $table->timestamp('createdAt', 3)->useCurrent();
            $table->timestamp('updatedAt', 3);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Vendor');
    }
};
