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
        Schema::create('skills_freelancer', function (Blueprint $table) {
            $table->unsignedBigInteger('skill_id');
            $table->unsignedBigInteger('freelancer_id');
            $table->foreign('skill_id')->references('id')->on('skills');
            $table->foreign('freelancer_id')->references('freelancer_id')->on('freelancer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills_freelancer');
    }
};
