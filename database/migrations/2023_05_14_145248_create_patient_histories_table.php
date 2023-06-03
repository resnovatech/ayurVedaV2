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
        Schema::create('patient_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('admin_id')->unsigned();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->bigInteger('doctor_id')->unsigned()->nullable();
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->bigInteger('doctor_appointment_id')->unsigned()->nullable();
            $table->foreign('doctor_appointment_id')->references('id')->on('doctor_appointments')->onDelete('cascade');
            $table->string('patient_id');
            $table->text('pradhan_vedana')->nullable();
            $table->text('vedana_vrutanta')->nullable();
            $table->text('chikitsa_vrutanta')->nullable();
            $table->text('stri_evam_prasooti_vrutant')->nullable();
            $table->text('poorva_vedana_vrutant')->nullable();
            $table->text('anuvanshika_vritanta')->nullable();
            $table->text('pratyaksh_pramanam')->nullable();
            $table->text('roga_preeksha_srotas_pareeksha')->nullable();
            $table->text('rasavaha_srotas')->nullable();
            $table->text('raktavaha_srotas')->nullable();
            $table->text('mamsavaha_srotas')->nullable();
            $table->text('medovaha_srotas')->nullable();
            $table->text('asthivaha_srotas')->nullable();
            $table->text('majjavaha_srotas')->nullable();
            $table->text('shukravaha_srotas')->nullable();
            $table->text('rogi_pareeksha')->nullable();
            $table->text('nadi')->nullable();
            $table->text('dosha')->nullable();
            $table->text('dushya')->nullable();
            $table->text('shwas')->nullable();
            $table->text('tap_temp')->nullable();
            $table->text('kala')->nullable();
            $table->text('bhara_wt')->nullable();
            $table->text('agni')->nullable();
            $table->text('raktchap_bp')->nullable();
            $table->text('prakruti')->nullable();
            $table->text('mala')->nullable();
            $table->text('vaya')->nullable();
            $table->text('mootra')->nullable();
            $table->text('satmya')->nullable();
            $table->text('kshudha')->nullable();
            $table->text('satva')->nullable();
            $table->text('nidra')->nullable();
            $table->text('ahara')->nullable();
            $table->text('vyasan')->nullable();
            $table->text('roga_mrag')->nullable();
            $table->text('rago_sthana')->nullable();
            $table->text('sadhyasadhyata')->nullable();
            $table->text('pathya')->nullable();
            $table->text('yoga_chikitsa')->nullable();
            $table->text('paramarsh')->nullable();
            $table->string('history_file')->nullable();
            $table->string('status')->nullable();
            $table->string('bill_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_histories');
    }
};
