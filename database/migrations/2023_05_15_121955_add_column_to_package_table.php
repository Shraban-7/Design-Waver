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
        Schema::table('packages', function (Blueprint $table) {
            $table->enum('home_view', ['0', '1'])->after('package_price')->default('1');
            // $table->enum('home_view')->after('package_price')->default('1');
            $table->enum('position', ['1', '2','3'])->after('home_view')->default('1');
            // $table->tinyInteger('position')->after('home_view')->default('1');
            $table->integer('delivery_time')->after('position')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            //
        });
    }
};
