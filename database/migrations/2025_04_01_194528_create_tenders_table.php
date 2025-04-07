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
        Schema::create('tenders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('tender_number');
            $table->text('description');
            $table->date('release_date'); //تاريخ الاصدار
            $table->date('closing_date');
            $table->decimal('budget', 15, 2);
            $table->enum('status', ['draft', 'published', 'under_evaluation', 'awarded', 'canceled'])->default('draft');
            $table->string('barcode');
            $table->foreignId('category_id')->constrained();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenders');
    }
};
