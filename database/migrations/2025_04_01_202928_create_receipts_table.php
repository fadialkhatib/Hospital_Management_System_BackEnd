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
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contract_id')->constrained()->comment('العقد');
            $table->string('receipt_number')->unique()->comment('رقم الإيصال');
            $table->date('receipt_date')->comment('تاريخ الاستلام');
            $table->text('notes')->nullable()->comment('ملاحظات');
            $table->json('attachments')->nullable()->comment('مرفقات');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
};
