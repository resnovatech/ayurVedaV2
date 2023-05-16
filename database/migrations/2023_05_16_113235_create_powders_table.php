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
        Schema::create('powders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('medicine_equipment_id')->unsigned();
            $table->foreign('medicine_equipment_id')->references('id')->on('medicine_equipment');
            $table->string('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('powders');
    }
};
