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
        Schema::create('e_m_p_transfar_operations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('empatients')->onDelete('cascade');
            $table->unsignedBigInteger('from_dep_id');
            $table->foreign('from_dep_id')->references('id')->on('departments')->onDelete('cascade');
            $table->unsignedBigInteger('to_dep_id');
            $table->foreign('to_dep_id')->references('id')->on('departments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_m_p_transfar_operations');
    }
};
