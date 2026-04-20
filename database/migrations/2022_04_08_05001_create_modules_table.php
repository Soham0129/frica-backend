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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('module_name', 191);
            $table->string('module_type', 191);
            $table->string('thumbnail', 255)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('stores_count')->default(0);
            $table->string('icon', 191)->nullable();
            $table->integer('theme_id')->default(1);
            $table->text('description')->nullable();
            $table->tinyInteger('all_zone_service')->default(0);
            $table->string('slug', 255)->nullable();
            $table->timestamps();
            
            // Indexes
            $table->index('module_type');
            $table->index('status');
            $table->index('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
