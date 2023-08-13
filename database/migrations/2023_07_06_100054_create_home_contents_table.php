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
        Schema::create('home_contents', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('header')->nullable();
            $table->string('banner')->nullable();
            $table->string('sub_title1')->nullable();
            $table->string('sub_title2')->nullable();
            $table->string('sub_title3')->nullable();
            $table->string('content1')->nullable();
            $table->string('content2')->nullable();
            $table->string('content3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_contents');
    }
};
