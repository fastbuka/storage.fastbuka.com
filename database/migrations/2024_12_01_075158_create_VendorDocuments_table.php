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
        Schema::create('VendorDocuments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('uuid')->unique('vendordocuments_uuid_key');
            $table->text('country')->nullable();
            $table->text('id_number')->nullable();
            $table->text('id_upload')->nullable();
            $table->text('business_number')->nullable();
            $table->text('business_upload')->nullable();
            $table->timestamp('createdAt', 3)->useCurrent();
            $table->timestamp('updatedAt', 3);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('VendorDocuments');
    }
};
