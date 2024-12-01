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
        Schema::create('PasswordResetTokens', function (Blueprint $table) {
            $table->increments('id');
            $table->text('user_uuid');
            $table->text('email');
            $table->text('token');
            $table->timestamp('createdAt', 3)->useCurrent();
            $table->timestamp('updatedAt', 3);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PasswordResetTokens');
    }
};
