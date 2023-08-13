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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('coupon_code');
            $table->enum('coupon_type', ['fixed', 'percent']);
            $table->decimal('coupon_value', 8, 2);
            $table->string('coupon_limit');
            $table->integer('coupon_used')->default(0);
            $table->integer('max_used')->default(1);
            $table->date('coupon_start_date');
            $table->date('coupon_end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
