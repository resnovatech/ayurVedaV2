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
        Schema::create('agrement_form_threes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('admin_id')->unsigned();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->string('opd_no');
            $table->string('name');
            $table->string('age',2);
            $table->string('gender',100);
            $table->text('diagnosis');
            $table->string('physician');
            $table->string('dos');
            $table->string('doc');
            $table->string('poorv_karma');
            $table->string('snehpanam');
            $table->string('pradhan_karma');
            $table->string('blood_pressure');
            $table->string('virechan_yog');
            $table->string('nadi');
            $table->string('samyak_lakshana_vegaki');
            $table->string('samyak_lakshana_manaki');
            $table->string('samyak_lakshana_laingaki');
            $table->string('laingaki');
            $table->string('type_of_shodhanam');
            $table->string('samsarjana_krama');
            $table->string('diet_on_day_before');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agrement_form_threes');
    }
};
