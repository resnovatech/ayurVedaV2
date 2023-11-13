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
        Schema::create('other_equipment_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('other_equipment_id')->unsigned();
            $table->foreign('other_equipment_id')->references('id')->on('other_equipment')->onDelete('cascade');
            $table->string('name');
            $table->string('quantity');
            $table->string('unit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('other_equipment_details');
    }
};
