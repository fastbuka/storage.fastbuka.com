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
        Schema::create('Order', function (Blueprint $table) {
            $table->increments('id');
            $table->text('uuid')->unique('order_uuid_key');
            $table->text('user_uuid');
            $table->text('vendor_uuid');
            $table->text('order_number')->nullable();
            $table->float('total_amount')->default(0);
            $table->float('discount_amount')->default(0);
            $table->float('paid_amount')->default(0);
            $table->text('delivery_address')->nullable();
            $table->text('payment_method')->nullable();
            $table->text('payment_status')->default('pending');
            $table->timestamp('createdAt', 3)->useCurrent();
            $table->timestamp('updatedAt', 3);
            $table->float('delivery_charges')->default(0);
            $table->text('delivery_contact')->nullable();
            $table->text('delivery_email')->nullable();
            $table->text('delivery_name')->nullable();
            $table->text('order_status')->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Order');
    }
};
