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
        Schema::create('receipt_items', function (Blueprint $table) {
            $table->id()->comment('المعرف الفريد لبند الاستلام');
            $table->foreignId('receipt_id')->constrained()->cascadeOnDelete()->comment('الإيصال');
            $table->foreignId('tender_item_id')->constrained()->comment('بند المناقصة');
            $table->foreignId('item_id')->nullable()->constrained()->comment('المادة إن وجدت');
            $table->integer('quantity_ordered')->comment('الكمية المطلوبة');
            $table->integer('quantity_received')->comment('الكمية المستلمة');
            $table->date('production_date')->nullable()->comment('تاريخ الإنتاج');
            $table->date('expiry_date')->nullable()->comment('تاريخ الانتهاء');
            $table->string('storage_location')->nullable()->comment('مكان التخزين');
            $table->decimal('unit_price', 12, 3)->comment('سعر الوحدة');
            $table->decimal('total_price', 15, 3)->comment('القيمة الإجمالية');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipt_items');
    }
};
