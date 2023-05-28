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
        Schema::create('agrement_form_one_medicine_lists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('agrement_form_one_id')->unsigned();
            $table->foreign('agrement_form_one_id')->references('id')->on('agrement_form_ones');
            $table->string('medicine_name');
            $table->string('quantity');
            $table->string('dos');
            $table->string('remark');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agrement_form_one_medicine_lists');
    }
};
