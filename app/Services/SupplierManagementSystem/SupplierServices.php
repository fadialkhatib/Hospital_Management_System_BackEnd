<?php

namespace App\Services\SupplierManagementSystem;

use App\Models\Item;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierServices
{

        public static function index()
        {
                return response()->json(['message' => Supplier::get()]);
        }

        public static function getActiveSuppliers()
        {
                return response()->json(['message' => Supplier::where('is_approved', true)->get()]);
        }

        public static function getNonActiveSuppliers()
        {
                return response()->json(['message' => Supplier::where('is_approved', false)->get()]);
        }

        public static function addSupplier(Request $request)
        {
                try {
                        $validate = $request->validate([
                                'name' => 'required',
                                'commerical_number' => 'required',
                                'type' => 'required',
                                'address' => 'required',
                                'email' => 'required|email',
                                'notes' => 'required'
                        ]);
                        $add = Supplier::create([
                                'name' => $validate['name'],
                                'commerical_number' => $validate['commerical_number'],
                                'type' => $validate['type'],
                                'address' => $validate['address'],
                                'email' => $validate['email'],
                                'is_approved' => $request->is_approved,
                                'notes' => $validate['notes'],
                        ]);
                        return response()->json(['message' => $add,with('Supplier Added Successfully')]);
                } catch (\Exception $e) {
                        return response()->json($e->getMessage());
                }
        }

        public static function updateSupplierinfo(Request $request)
        {
                try {
                        $update = Supplier::where('id', $request->id)->update([
                                'name' => $request['name'],
                                'commerical_number' => $request['commerical_number'],
                                'type' => $request['type'],
                                'address' => $request['address'],
                                'email' => $request['email'],
                                'is_approved' => $request->is_approved,
                                'notes' => $request['notes'],
                        ]);
                        return response()->json(['message' => $update])->with('Supplier info Updated Successfully');
                } catch (\Exception $e) {
                        return response()->json($e->getMessage());
                }
        }

        public static function approve(Request $request)
        {
                $supplier = Supplier::where('id', $request->id)->first();
                if ($supplier->isEmpty()) {
                        return response()->json(['message' => 'Supplier not found ']);
                }
                if ($supplier->is_approved == true) {
                        $supplier->update(['is_approved' => false]);
                        return response()->json(['message' => 'the supplier that name is ' . $supplier->name .
                                'NOT Approved now'], 200);
                }
                $supplier->update([
                        'is_approved' => true
                ]);
                return response()->json(['message' => 'the supplier that name is ' . $supplier->name .
                        'Approved now'], 200);
        }


        public static function getSupplier(Request $request)
        {
                return response()->json(['message' => Supplier::where('id', $request->id)->get()]);
        }

        public static function getSupplierItem(Request $request)
        {
                $supplier = Supplier::where('id', $request->supplier_id)->first();
                $items = Item::where('supplier_id', $request->supplier_id)->get();
                if ($items->isEmpty()) {
                        return response()->json(['message' => 'the Items is empty'], 400);
                }
                return response()->json([
                        'message' => 'The Items That belongs to this supplier is ',
                        $items
                ], 200);
        }
}
