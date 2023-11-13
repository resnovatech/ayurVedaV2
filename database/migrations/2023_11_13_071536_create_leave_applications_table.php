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
        Schema::create('leave_applications', function (Blueprint $table) {
            $table->id();
            $table->string('type_id');
            $table->string('detail_type_id');
            $table->string('app_start_date');
            $table->string('app_end_date');
            $table->string('day');
            $table->string('hard_copy');
            $table->string('approved_start_date');
            $table->string('approved_end_date');
            $table->string('approved_day');
            $table->string('approved_by');
            $table->string('approved_reason');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_applications');
    }
};
