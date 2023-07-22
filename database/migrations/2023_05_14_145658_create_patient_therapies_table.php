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
        Schema::create('patient_therapies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('doctor_id')->unsigned()->nullable();
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->bigInteger('doctor_appointment_id')->unsigned()->nullable();
            $table->foreign('doctor_appointment_id')->references('id')->on('doctor_appointments')->onDelete('cascade');
            $table->bigInteger('patient_history_id')->unsigned();
            $table->foreign('patient_history_id')->references('id')->on('patient_histories')->onDelete('cascade');
            $table->string('patient_id');
            $table->string('name');
            $table->string('amount');
            $table->string('status');
            $table->string('therapy_type')->nullable();;
            $table->string('package_name')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_therapies');
    }
};
