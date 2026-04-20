<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('zones', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->unique();
            // coordinates will be added separately as spatial column
            $table->tinyInteger('status')->default(1);
            $table->string('store_wise_topic', 255)->nullable();
            $table->string('customer_wise_topic', 255)->nullable();
            $table->string('deliveryman_wise_topic', 255)->nullable();
            $table->tinyInteger('cash_on_delivery')->default(0);
            $table->tinyInteger('digital_payment')->default(0);
            $table->double('increased_delivery_fee', 8, 2)->default(0.00);
            $table->tinyInteger('increased_delivery_fee_status')->default(0);
            $table->string('increase_delivery_charge_message', 255)->nullable();
            $table->tinyInteger('offline_payment')->default(0);
            $table->string('display_name', 255)->nullable();
            $table->tinyInteger('is_default')->default(0);
            $table->timestamps();
            
            // Indexes
            $table->index('status');
            $table->index('is_default');
        });
        
        // Add polygon column using raw SQL
        DB::statement('ALTER TABLE zones ADD COLUMN coordinates POLYGON NOT NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zones');
    }
};
