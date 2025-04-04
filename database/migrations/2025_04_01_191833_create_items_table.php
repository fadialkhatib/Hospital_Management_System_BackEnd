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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->text('description');
            $table->string('barcode')->unique();
            $table->string('qr_code_path')->nullable();
            $table->string('unit');
            $table->decimal('weight',10,3)->nullable();
            $table->integer('current_quantity')->default(0);
            $table->string('min_quantity')->default(10);
            $table->decimal('cost',12,3);
            $table->boolean('is_expirable')->default(true);
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');

            $table->index('min_quantity','is_expirable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
