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
        Schema::table('Cart', function (Blueprint $table) {
            $table->foreign(['user_uuid'], 'Cart_user_uuid_fkey')->references(['uuid'])->on('User')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign(['vendor_uuid'], 'Cart_vendor_uuid_fkey')->references(['uuid'])->on('Vendor')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Cart', function (Blueprint $table) {
            $table->dropForeign('Cart_user_uuid_fkey');
            $table->dropForeign('Cart_vendor_uuid_fkey');
        });
    }
};
