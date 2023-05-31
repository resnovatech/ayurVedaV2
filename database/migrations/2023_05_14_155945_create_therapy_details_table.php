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
        Schema::create('therapy_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('therapy_list_id')->unsigned();
            $table->foreign('therapy_list_id')->references('id')->on('therapy_lists')->onDelete('cascade');
            $table->bigInteger('therapy_ingredient_id')->unsigned();
            $table->foreign('therapy_ingredient_id')->references('id')->on('therapy_ingredients')->onDelete('cascade');
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
        Schema::dropIfExists('therapy_details');
    }
};
