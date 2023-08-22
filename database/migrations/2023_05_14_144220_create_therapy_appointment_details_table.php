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
        Schema::create('therapy_appointment_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('therapy_appointment_id')->unsigned();
            $table->foreign('therapy_appointment_id')->references('id')->on('therapy_appointments')->onDelete('cascade');
            $table->string('therapy_name');
            $table->text('name')->nullable();
            $table->string('amount')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('therapy_appointment_details');
    }
};
