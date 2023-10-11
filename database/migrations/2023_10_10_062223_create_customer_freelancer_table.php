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
        Schema::create('customer_freelancer', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('freelancer_id');
            $table->unsignedBigInteger('job_id');
            $table->foreign('customer_id')->references('customer_id')->on('customer');
            $table->foreign('freelancer_id')->references('freelancer_id')->on('freelancer');
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->boolean('signed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_freelancer');
    }
};
