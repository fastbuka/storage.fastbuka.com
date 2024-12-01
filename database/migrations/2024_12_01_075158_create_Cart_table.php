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
        Schema::create('Cart', function (Blueprint $table) {
            $table->increments('id');
            $table->text('uuid')->unique('cart_uuid_key');
            $table->text('user_uuid');
            $table->text('vendor_uuid');
            $table->timestamp('createdAt', 3)->useCurrent();
            $table->timestamp('updatedAt', 3);

            $table->unique(['user_uuid', 'vendor_uuid'], 'cart_user_uuid_vendor_uuid_key');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Cart');
    }
};
