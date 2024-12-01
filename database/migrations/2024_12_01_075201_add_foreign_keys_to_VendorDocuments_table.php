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
        Schema::table('VendorDocuments', function (Blueprint $table) {
            $table->foreign(['uuid'], 'VendorDocuments_uuid_fkey')->references(['uuid'])->on('Vendor')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('VendorDocuments', function (Blueprint $table) {
            $table->dropForeign('VendorDocuments_uuid_fkey');
        });
    }
};
