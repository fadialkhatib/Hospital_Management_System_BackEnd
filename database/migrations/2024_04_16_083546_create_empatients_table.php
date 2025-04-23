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
        Schema::create('empatients', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('address');
            $table->dateTimeTz('date_of_birth');
            $table->string('mom_name');
            $table->integer('chain')->unique()->min(11);
            $table->enum('gender', ['male', 'female'])->notnull();
            $table->string('chronic_diseases'); //الأمراض المزمنة
            $table->enum('blood_type', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']);
            $table->string('case_description');
            $table->string('treatment_required');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empatients');
    }
};
