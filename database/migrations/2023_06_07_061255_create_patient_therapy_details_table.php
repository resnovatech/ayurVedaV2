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
        Schema::create('patient_therapy_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('patient_therapy_id')->unsigned();
            $table->foreign('patient_therapy_id')->references('id')->on('patient_therapies')->onDelete('cascade');
            $table->string('ingredient_name');
            $table->text('quantity');
            $table->string('unit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_therapy_details');
    }
};
