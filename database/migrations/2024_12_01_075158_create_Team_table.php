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
        Schema::create('Team', function (Blueprint $table) {
            $table->increments('id');
            $table->text('uuid')->unique('team_uuid_key');
            $table->text('profile');
            $table->text('name');
            $table->text('role');
            $table->text('description');
            $table->timestamp('createdAt', 3)->useCurrent();
            $table->timestamp('updatedAt', 3);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Team');
    }
};