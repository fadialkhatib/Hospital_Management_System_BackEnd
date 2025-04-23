<?php

namespace App\Listeners;

use App\Events\LowStockEvent;
use App\Models\Item;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class UpdateStockCache
{
    public function handle($event)
    {
        Cache::forget('low_stock_items');
        Cache::remember('low_stock_items', 60, function () {
            return Item::whereColumn('current_quantity', '<', 'min_quantity')->get();
        });
    }
}
