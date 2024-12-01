<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('_prisma_migrations', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('checksum', 64);
            $table->timestampTz('finished_at')->nullable();
            $table->string('migration_name');
            $table->text('logs')->nullable();
            $table->timestampTz('rolled_back_at')->nullable();
            $table->timestampTz('started_at')->default(DB::raw("now()"));
            $table->integer('applied_steps_count')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_prisma_migrations');
    }
};
