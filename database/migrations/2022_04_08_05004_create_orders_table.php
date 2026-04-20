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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->decimal('order_amount', 24, 2)->default(0.00);
            $table->decimal('coupon_discount_amount', 24, 2)->default(0.00);
            $table->string('coupon_discount_title', 255)->nullable();
            $table->string('payment_status', 255)->default('unpaid');
            $table->string('order_status', 255)->default('pending');
            $table->decimal('total_tax_amount', 24, 2)->default(0.00);
            $table->string('payment_method', 30)->nullable();
            $table->string('transaction_reference', 30)->nullable();
            $table->bigInteger('delivery_address_id')->nullable();
            $table->unsignedBigInteger('delivery_man_id')->nullable();
            $table->string('coupon_code', 255)->nullable();
            $table->text('order_note')->nullable();
            $table->string('order_type', 255)->default('delivery');
            $table->tinyInteger('checked')->default(0);
            $table->unsignedBigInteger('store_id')->nullable();
            $table->timestamps();
            
            $table->decimal('delivery_charge', 24, 2)->default(0.00);
            $table->timestamp('schedule_at')->nullable();
            $table->string('callback', 255)->nullable();
            $table->string('otp', 255)->nullable();
            
            // Status timestamps
            $table->timestamp('pending')->nullable();
            $table->timestamp('accepted')->nullable();
            $table->timestamp('confirmed')->nullable();
            $table->timestamp('processing')->nullable();
            $table->timestamp('handover')->nullable();
            $table->timestamp('picked_up')->nullable();
            $table->timestamp('delivered')->nullable();
            $table->timestamp('canceled')->nullable();
            $table->timestamp('refund_requested')->nullable();
            $table->timestamp('refunded')->nullable();
            $table->timestamp('failed')->nullable();
            $table->timestamp('refund_request_canceled')->nullable();
            
            $table->text('delivery_address')->nullable();
            $table->tinyInteger('scheduled')->default(0);
            $table->decimal('store_discount_amount', 24, 2)->default(0.00);
            $table->decimal('original_delivery_charge', 24, 2)->default(0.00);
            $table->decimal('adjusment', 24, 2)->default(0.00);
            $table->tinyInteger('edited')->default(0);
            $table->string('delivery_time', 255)->nullable();
            $table->unsignedBigInteger('zone_id')->nullable();
            $table->unsignedBigInteger('module_id');
            $table->text('order_attachment')->nullable();
            $table->unsignedBigInteger('parcel_category_id')->nullable();
            $table->longText('receiver_details')->nullable();
            $table->enum('charge_payer', ['sender', 'receiver'])->nullable();
            $table->double('distance', 16, 3)->default(0.000);
            $table->double('dm_tips', 24, 2)->default(0.00);
            $table->string('free_delivery_by', 255)->nullable();
            $table->tinyInteger('prescription_order')->default(0);
            $table->string('tax_status', 50)->nullable();
            $table->unsignedBigInteger('dm_vehicle_id')->nullable();
            $table->string('cancellation_reason', 255)->nullable();
            $table->string('canceled_by', 50)->nullable();
            $table->string('coupon_created_by', 50)->nullable();
            $table->string('discount_on_product_by', 50)->default('vendor');
            $table->string('processing_time', 10)->nullable();
            $table->string('unavailable_item_note', 255)->nullable();
            $table->tinyInteger('cutlery')->default(0);
            $table->text('delivery_instruction')->nullable();
            $table->double('tax_percentage', 24, 3)->nullable();
            $table->double('additional_charge', 23, 3)->default(0.000);
            $table->text('order_proof')->nullable();
            $table->double('partially_paid_amount', 23, 3)->default(0.000);
            $table->tinyInteger('is_guest')->default(0);
            $table->double('flash_admin_discount_amount', 24, 3)->default(0.000);
            $table->double('flash_store_discount_amount', 24, 3)->default(0.000);
            $table->unsignedBigInteger('cash_back_id')->nullable();
            $table->double('extra_packaging_amount', 23, 3)->default(0.000);
            $table->double('ref_bonus_amount', 23, 3)->default(0.000);
            $table->string('tax_type', 255)->nullable();
            $table->integer('bring_change_amount')->default(0);
            $table->text('cancellation_note')->nullable();
            
            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('delivery_man_id')->references('id')->on('delivery_men')->onDelete('set null');
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('set null');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
            $table->foreign('parcel_category_id')->references('id')->on('parcel_categories')->onDelete('set null');
            $table->foreign('dm_vehicle_id')->references('id')->on('d_m_vehicles')->onDelete('set null');
            $table->foreign('cash_back_id')->references('id')->on('cash_backs')->onDelete('set null');
            
            // Indexes
            $table->index('user_id');
            $table->index('store_id');
            $table->index('delivery_man_id');
            $table->index('zone_id');
            $table->index('module_id');
            $table->index('order_status');
            $table->index('payment_status');
            $table->index('schedule_at');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
