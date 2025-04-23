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
        Schema::create('inventory_logs', function (Blueprint $table) {
            $table->id()->comment('المعرف الفريد للحركة');
            $table->foreignId('item_id')->constrained()->onDelete('cascade')->comment('المادة');
            $table->foreignId('department_id')->constrained()->comment('المستخدم');
            $table->enum('action_type', ['purchase', 'sale', 'return', 'adjustment', 'transfer', 'expiry', 'damage'])->comment('نوع الحركة');
            $table->integer('quantity')->comment('الكمية');
            $table->decimal('unit_cost', 12, 3)->nullable()->comment('تكلفة الوحدة');
            $table->decimal('total_cost', 15, 3)->nullable()->comment('التكلفة الإجمالية');
            $table->string('reference_type')->nullable()->comment('نوع المرجع');
            $table->unsignedBigInteger('reference_id')->nullable()->comment('معرف المرجع');
            $table->string('batch_number')->nullable()->comment('رقم الدفعة');
            $table->date('expiry_date')->nullable()->comment('تاريخ الانتهاء');
            $table->text('notes')->nullable()->comment('ملاحظات');
            $table->timestamps();
    
            $table->index(['reference_type', 'reference_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_logs');
    }
};
