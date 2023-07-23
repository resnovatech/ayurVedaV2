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
        Schema::create('single_ingredients', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('therapy_appointment_detail_id')->unsigned();
            $table->foreign('therapy_appointment_detail_id')->references('id')->on('therapy_appointment_details')->onDelete('cascade');
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
        Schema::dropIfExists('single_ingredients');
    }
};
