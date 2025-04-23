<?php

namespace App\Listeners;

use App\Events\InventoryChanged;
use App\Models\Inventory_log;
use App\Models\InventoryLog; // تصحيح اسم النموذج
use App\Models\Item;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class LogInventoryChange
{
    // public function handle(InventoryChanged $event)
    // {
    //     if (!$event->item || !$event->item->exists) {
    //         \Log::error('Invalid item in inventory event', ['event' => $event]);
    //         return;
    //     }

    //     \Log::debug('Processing inventory change', [
    //         'item_id' => $event->item->id,
    //         'action' => $event->action
    //     ]);
    //     $item = $event->item;

    //     Inventory_log::create([
    //         'item_id' => $event->item->id,
    //         'action_type' => match ($event->action) {
    //             'create' => 'purchase',
    //             'update' => 'adjustment',
    //             'delete' => 'damage',
    //             default => 'adjustment'
    //         },
    //         'quantity' => $this->resolveQuantity($event, $item),
    //         'unit_cost' => $item->cost,
    //         'total_cost' => $item->cost * $this->resolveQuantity($event, $item),
    //         'reference_type' => Item::class,
    //         'reference_id' => $event->item,
    //         'notes' => $this->generateNotes($event->action, $event->changes)
    //     ]);
    // }

    // protected function resolveQuantity(InventoryChanged $event, $item)
    // {
    //     if ($event->action === 'delete') {
    //         return $item->quantity;
    //     }

    //     return $event->changes['current_quantity'][1] ?? $item->current_quantity;
    // }



    // protected function generateNotes($action, $changes)
    // {
    //     $notes = "تم " . match ($action) {
    //         'create' => 'إضافة مادة جديدة',
    //         'update' => 'تعديل المادة. التغييرات: ' . json_encode($changes),
    //         'delete' => 'حذف المادة',
    //     };

    //     return $notes;
    // }
}
