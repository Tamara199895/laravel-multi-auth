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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('freelancer_id')->nullable();
            $table->foreign('customer_id')->references('customer_id')->on('customer');
            $table->foreign('freelancer_id')->references('freelancer_id')->on('freelancer');
            $table->string('work_name');
            $table->string('work_description');
            $table->string('status');
            $table->string('rate_description');
            $table->string('rate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
