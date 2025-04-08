<?php

namespace App\Listeners;

use App\Events\InventoryChanged;
use App\Models\Inventory_log;
use App\Models\InventoryLog; // تصحيح اسم النموذج
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class LogInventoryChange implements ShouldQueue
{
    public function handle(InventoryChanged $event, Request $request)
    {
        $item = $event->item; // أو $material حسب ما يرسله الحدث
        $action = $event->action;
        $changes = $event->changes;
        $departmentId = $event->department_id; // أو $userId حسب ما يرسله الحدث

        $logType = match ($action) {
            'create' => 'purchase',
            'update' => 'adjustment',
            'delete' => 'damage',
            default => 'adjustment'
        };
        $token = json_decode(base64_decode($request->header('token')));
        Inventory_log::create([ // تصحيح اسم النموذج
            'item_id' => $item->id, // تصحيح المتغير
            'department_id' => $departmentId ?? $token->id, // تصحيح المتغير
            'action_type' => $logType,
            'quantity' => $action === 'delete' ? $item->quantity : ($changes['quantity'][1] ?? $item->quantity),
            'unit_cost' => $item->unit_cost,
            'total_cost' => $item->unit_cost * $item->quantity,
            'reference_type' => get_class($item),
            'reference_id' => $item->id,
            'notes' => $this->generateNotes($action, $changes)
        ]);
    }

    protected function generateNotes($action, $changes)
    {
        $notes = "تم " . match ($action) {
            'create' => 'إضافة مادة جديدة',
            'update' => 'تعديل المادة. التغييرات: ' . json_encode($changes),
            'delete' => 'حذف المادة',
        };

        return $notes;
    }
}
