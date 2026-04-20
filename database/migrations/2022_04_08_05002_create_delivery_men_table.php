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
        Schema::create('delivery_men', function (Blueprint $table) {
            $table->id();
            $table->string('f_name', 100)->nullable();
            $table->string('l_name', 100)->nullable();
            $table->string('phone', 20)->unique();
            $table->string('email', 100)->nullable();
            $table->string('identity_number', 30)->nullable();
            $table->string('identity_type', 50)->nullable();
            $table->text('identity_image');
            $table->string('image', 100)->nullable();
            $table->string('password', 100);
            $table->string('auth_token', 255)->nullable();
            $table->string('fcm_token', 255)->nullable();
            $table->bigInteger('zone_id')->nullable();
            $table->timestamps();
            
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('earning')->default(1);
            $table->integer('current_orders')->default(0);
            $table->string('type', 191)->default('zone_wise');
            $table->bigInteger('store_id')->nullable();
            $table->enum('application_status', ['approved', 'denied', 'pending'])->default('approved');
            $table->integer('order_count')->unsigned()->default(0);
            $table->integer('assigned_order_count')->unsigned()->default(0);
            $table->unsignedBigInteger('vehicle_id')->nullable();
            $table->double('loyalty_point')->default(0);
            $table->string('ref_code', 255)->nullable();
            $table->unsignedBigInteger('ref_by')->nullable();
            
            // Foreign keys
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('set null');
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('set null');
            $table->foreign('vehicle_id')->references('id')->on('d_m_vehicles')->onDelete('set null');
            $table->foreign('ref_by')->references('id')->on('delivery_men')->onDelete('set null');
            
            // Indexes
            $table->index('zone_id');
            $table->index('store_id');
            $table->index('vehicle_id');
            $table->index('status');
            $table->index('active');
            $table->index('phone');
            $table->index('application_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_men');
    }
};
