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
        Schema::create('agrement_form_one_sneha_lists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('agrement_form_one_id')->unsigned();
            $table->foreign('agrement_form_one_id')->references('id')->on('agrement_form_ones')->onDelete('cascade');
            $table->string('sneha_name');
            $table->string('day_one');
            $table->string('day_two');
            $table->string('day_three');
            $table->string('day_four');
            $table->string('day_five');
            $table->string('day_six');
            $table->string('day_seven');
            $table->string('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agrement_form_one_sneha_lists');
    }
};
