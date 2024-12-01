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
        Schema::create('PersonalAccessToken', function (Blueprint $table) {
            $table->increments('id');
            $table->text('user_uuid');
            $table->text('token')->unique('personalaccesstoken_token_key');
            $table->text('ipAddress')->nullable();
            $table->timestamp('createdAt', 3)->useCurrent();
            $table->timestamp('updatedAt', 3);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PersonalAccessToken');
    }
};
