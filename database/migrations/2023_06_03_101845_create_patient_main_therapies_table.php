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
        Schema::create('patient_main_therapies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('therapist_id')->unsigned()->nullable();
            $table->foreign('therapist_id')->references('id')->on('therapists')->onDelete('cascade');
            $table->bigInteger('therapy_appointment_id')->unsigned()->nullable();
            $table->foreign('therapy_appointment_id')->references('id')->on('therapy_appointments')->onDelete('cascade');
            $table->bigInteger('patient_history_id')->unsigned();
            $table->foreign('patient_history_id')->references('id')->on('patient_histories')->onDelete('cascade');
            $table->string('patient_id');
            $table->string('therapy_package_id')->nullable();
            $table->string('name');
            $table->string('amount');
            $table->string('face_pack_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_main_therapies');
    }
};
