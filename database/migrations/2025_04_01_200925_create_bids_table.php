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
        Schema::create('bids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tender_id');
            $table->foreignId('supplier_id');
            $table->string('bid_number')->unique();
            $table->decimal('total_amount', 15, 2); //القيمة الإجمالية
            $table->decimal('tax_amount', 15, 2)->default(0)->comment; //قيمة الضريبة'
            $table->decimal('discount_amount', 15, 2)->default(0)->comment; //قيمة الخصم'
            $table->string('currency', 3)->default('U$A');
            $table->date('valid_until');
            $table->enum('status', ['draft', 'submitted', 'under_technical_evaluation', 'under_financial_evaluation', 'accepted', 'rejected'])->default('draft');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bids');
    }
};
