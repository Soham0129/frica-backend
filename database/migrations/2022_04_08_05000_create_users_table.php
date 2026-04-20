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
        if (!Schema::hasTable('users')) {
            // Create table if it doesn't exist (for empty database)
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('f_name');
                $table->string('l_name');
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password', 100)->nullable();
                $table->string('phone')->unique()->nullable();
                $table->boolean('is_phone_verified')->default(0);
                $table->boolean('is_email_verified')->default(0);
                $table->boolean('is_from_pos')->default(0);
                $table->rememberToken();
                $table->timestamps();         
                    
                $table->integer('order_count')->default(0);          
                $table->decimal('wallet_balance', 24, 3)->default(0);
                $table->decimal('loyalty_point', 24, 3)->default(0);
                $table->string('image', 255)->nullable();
                $table->string('cm_firebase_token')->nullable();
                $table->string('lang', 20)->default('en');
                $table->string('current_language_key')->default('en')->nullable();
                $table->string('login_type')->default('manual');
                $table->boolean('status')->default(1);
                $table->unsignedBigInteger('ref_by')->nullable();
                $table->string('temp_token')->nullable();
                $table->string('module_ids')->nullable();
            });
        } else {
            // Modify existing table if it exists (to preserve data)
            Schema::table('users', function (Blueprint $table) {
                // Only add columns that don't exist to preserve existing data
                if (!Schema::hasColumn('users', 'wallet_balance')) {
                    $table->decimal('wallet_balance', 24, 3)->default(0);
                }
                if (!Schema::hasColumn('users', 'loyalty_point')) {
                    $table->decimal('loyalty_point', 24, 3)->default(0);
                }
                if (!Schema::hasColumn('users', 'current_language_key')) {
                    $table->string('current_language_key')->default('en')->nullable();
                }
                if (!Schema::hasColumn('users', 'ref_by')) {
                    $table->unsignedBigInteger('ref_by')->nullable();
                }
                if (!Schema::hasColumn('users', 'temp_token')) {
                    $table->string('temp_token')->nullable();
                }
                if (!Schema::hasColumn('users', 'module_ids')) {
                    $table->string('module_ids')->nullable();
                }
                if (!Schema::hasColumn('users', 'is_email_verified')) {
                    $table->boolean('is_email_verified')->default(0);
                }
                if (!Schema::hasColumn('users', 'is_from_pos')) {
                    $table->boolean('is_from_pos')->default(0);
                }
                
                // Modify existing columns if needed
                if (Schema::hasColumn('users', 'password')) {
                    $table->string('password', 100)->nullable()->change();
                }
                if (Schema::hasColumn('users', 'phone')) {
                    $table->string('phone')->nullable()->change();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
