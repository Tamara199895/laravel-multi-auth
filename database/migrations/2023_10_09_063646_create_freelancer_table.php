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
        Schema::create('freelancer', function (Blueprint $table) {
            $table->unsignedBigInteger('freelancer_id')->nullable();
            $table->foreign('freelancer_id')->references('id')->on('users');
            $table->bigInteger('hourly_pay')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freelancer');
    }
};
