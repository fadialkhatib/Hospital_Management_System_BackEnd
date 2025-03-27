<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('FilesArchives', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->string('address');
            $table->dateTimeTz('date_of_birth');
            $table->string('mom_name');
            $table->integer('chain');
            $table->enum('gender',['male','female']);
            $table->unsignedBigInteger('department_id');
            $table->string('test_result');
            $table->string('X_ray_result');
            $table->enum('resident',['yes','no'])->default('no');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->timestamps();
        });
    }

 
     
    public function down(): void
    {
        Schema::dropIfExists('files_archives');
    }
};