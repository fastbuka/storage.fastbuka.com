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
        Schema::table('Food', function (Blueprint $table) {
            $table->foreign(['category_uuid'], 'Food_category_uuid_fkey')->references(['uuid'])->on('Category')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['vendor_uuid'], 'Food_vendor_uuid_fkey')->references(['uuid'])->on('Vendor')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Food', function (Blueprint $table) {
            $table->dropForeign('Food_category_uuid_fkey');
            $table->dropForeign('Food_vendor_uuid_fkey');
        });
    }
};
