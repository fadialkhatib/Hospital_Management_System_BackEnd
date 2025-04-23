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
        Schema::create('bid_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bid_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tender_item_id')->constrained();
            $table->decimal('unit_price', 12, 3);
            $table->decimal('total_price', 15, 3);
            $table->string('currency', 3)->default('U$A');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bid_items');
    }
};
