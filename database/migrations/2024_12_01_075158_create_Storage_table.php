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
        Schema::create('Storage', function (Blueprint $table) {
            $table->increments('id');
            $table->text('uuid')->unique('storage_uuid_key');
            $table->text('slug')->unique('storage_slug_key');
            $table->text('user_uuid');
            $table->text('base_url')->nullable();
            $table->text('path');
            $table->text('size')->nullable();
            $table->text('type')->nullable();
            $table->text('use')->nullable();

            $table->unique(['user_uuid', 'use'], 'storage_user_uuid_use_key');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Storage');
    }
};
