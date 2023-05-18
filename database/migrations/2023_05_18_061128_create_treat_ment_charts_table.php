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
        Schema::create('treat_ment_charts', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id');
            $table->string('therapy_id');
            $table->string('day');
            $table->string('time_of_the_day');
            $table->string('patient_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treat_ment_charts');
    }
};
