<?php

namespace App\Observers;

use App\Models\Material;
use App\Events\InventoryChanged;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemObserver
{
    // public function created()
    // {
    //     $item = Item::first();
    //     event(new InventoryChanged($item, 'create', null));
    // }

    // public function updated(Item $item, Request $request)
    // {
    //     $token = json_decode(base64_decode($request->header('token')));
    //     event(new InventoryChanged(
    //         $item,
    //         'update',
    //         $item->getChanges(),
    //         $token->id
    //     ));
    // }

    // public function deleted(Item $item, Request $request)
    // {
    //     $token = json_decode(base64_decode($request->header('token')));
    //     event(new InventoryChanged($item, 'delete', null, $token->id));
    // }
}
