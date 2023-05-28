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
        Schema::create('samyak_lakshanas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('agrement_form_one_id')->unsigned();
            $table->foreign('agrement_form_one_id')->references('id')->on('agrement_form_ones');
            $table->string('vdgaki');
            $table->string('manaki');
            $table->string('laingaki');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('samyak_lakshanas');
    }
};
