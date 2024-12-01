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
        Schema::create('User', function (Blueprint $table) {
            $table->increments('id');
            $table->text('uuid')->unique('user_uuid_key');
            $table->text('email')->unique('user_email_key');
            $table->text('contact')->nullable()->unique('user_contact_key');
            $table->text('username')->unique('user_username_key');
            $table->float('balance')->default(0);
            $table->text('walletAddress')->unique('user_walletaddress_key');
            $table->text('secretKey')->unique('user_secretkey_key');
            $table->text('password');
            $table->boolean('email_verified')->default(false);
            $table->boolean('contact_verified')->default(false);
            $table->text('role')->default('user');
            $table->text('status')->default('actived');
            $table->boolean('isOnline')->default(true);
            $table->timestamp('createdAt', 3)->useCurrent();
            $table->timestamp('updatedAt', 3);
            $table->boolean('trustlines')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('User');
    }
};
