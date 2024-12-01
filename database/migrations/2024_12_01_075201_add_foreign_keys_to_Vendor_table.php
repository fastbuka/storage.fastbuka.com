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
        Schema::table('Vendor', function (Blueprint $table) {
            $table->foreign(['user_uuid'], 'Vendor_user_uuid_fkey')->references(['uuid'])->on('User')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Vendor', function (Blueprint $table) {
            $table->dropForeign('Vendor_user_uuid_fkey');
        });
    }
};
