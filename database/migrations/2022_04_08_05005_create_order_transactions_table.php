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
        Schema::create('order_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->unsignedBigInteger('delivery_man_id')->nullable();
            $table->unsignedBigInteger('order_id');
            $table->decimal('order_amount', 24, 2);
            $table->decimal('store_amount', 24, 2)->default(0.00);
            $table->decimal('admin_commission', 24, 2);
            $table->string('received_by', 255);
            $table->string('status', 255)->nullable();
            $table->timestamps();
            
            $table->decimal('delivery_charge', 24, 2)->default(0.00);
            $table->decimal('original_delivery_charge', 24, 2)->default(0.00);
            $table->decimal('tax', 24, 2)->default(0.00);
            $table->unsignedBigInteger('zone_id')->nullable();
            $table->unsignedBigInteger('module_id');
            $table->unsignedBigInteger('parcel_catgory_id')->nullable();
            $table->double('dm_tips', 24, 2)->default(0.00);
            $table->double('delivery_fee_comission', 24, 2)->default(0.00);
            $table->decimal('admin_expense', 23, 3)->default(0.000);
            $table->double('store_expense', 23, 3)->default(0.000);
            $table->double('discount_amount_by_store', 23, 3)->default(0.000);
            $table->double('additional_charge', 23, 3)->default(0.000);
            $table->double('extra_packaging_amount', 23, 3)->default(0.000);
            $table->double('ref_bonus_amount', 23, 3)->default(0.000);
            $table->double('commission_percentage', 16, 3)->default(0.000);
            $table->tinyInteger('is_subscribed')->default(0);
            
            // Foreign keys
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('set null');
            $table->foreign('delivery_man_id')->references('id')->on('delivery_men')->onDelete('set null');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('set null');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
            $table->foreign('parcel_catgory_id')->references('id')->on('parcel_categories')->onDelete('set null');
            
            // Indexes
            $table->index('vendor_id');
            $table->index('delivery_man_id');
            $table->index('order_id');
            $table->index('zone_id');
            $table->index('module_id');
            $table->index('status');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_transactions');
    }
};
