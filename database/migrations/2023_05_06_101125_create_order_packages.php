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
        Schema::create('order_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreignId('package_id')->references('id')->on('packages')->onDelete('cascade');
            $table->foreignId('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->string('package_price');
            $table->string('package_quantity');
            $table->boolean('status')->default(0);
            $table->string('main_price')->nullable()->after('package_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_packages');
    }
};
