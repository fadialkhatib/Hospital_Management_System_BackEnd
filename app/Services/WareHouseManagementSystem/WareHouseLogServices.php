<?php

namespace App\Services\WareHouseManagementSystem;

use App\Models\Inventory_log;
use Illuminate\Http\Request;

class WareHouseLogServices
{

        public static function Logs()
        {
                return response()->json(['message' => Inventory_log::get()]);
        }

        public static function logsByAction(Request $request)
        {
                $action = ['purchase', 'sale', 'return', 'adjustment', 'transfer', 'expiry', 'damage'];
                $validate = $request->validate([
                        'action' => [
                                'required',
                                'in :' .
                                        implode(',', $action)
                        ]
                ]);
                $get = Inventory_log::where('action', $validate['action'])->get();
                return response()->json(['nessage' => $get], 200);
        }


        public static function getLog(Request $request)
        {
                return response()->json(['message' => Inventory_log::where('id', $request->log_id)->first()]);
        }
}
