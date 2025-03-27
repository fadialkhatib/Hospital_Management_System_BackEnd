<?php

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentServices{
        public static function store(Request $request)
        {
                $equipment = Equipment::create($request->all());
                return response()->json(['New Equipment'=>$equipment], 201);
        }

        public static function show($id)
        {
                $equipment = Equipment::findOrFail($id);
               return response()->json(['This Equipment'=>$equipment],201);
        }

        public static function update(Request $request)
        {
                $equipment = Equipment::findOrFail($request->id);
                $equipment->update($request->all());
                return response()->json(['The Equipment Update '=>$equipment], 200);
        }

        public static function destroy($id)
        {
                Equipment::destroy($id);
                return response()->json(['message'=>'the equipment deleted successfully!']);
        }
}