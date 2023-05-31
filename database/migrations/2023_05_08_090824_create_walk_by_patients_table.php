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
        Schema::create('walk_by_patients', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->bigInteger('admin_id')->unsigned();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->string('patient_reg_id');
            $table->string('name');
            $table->string('refer_from');
            $table->string('age',10);
            $table->string('gender',20);
            $table->text('address');
            $table->string('email_address');
            $table->string('phone_or_mobile_number',11);
            $table->string('nid_number',25);
            $table->string('nationality',100);
            $table->text('how_did_you_come_to_know_about_this_center');
            $table->text('do_you_have_earlier_experience_of_ayurveda_please_give_details');
            $table->text('do_you_have_symptoms_in_past_one_weak');
            $table->string('covid_test_result',10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('walk_by_patients');
    }
};
