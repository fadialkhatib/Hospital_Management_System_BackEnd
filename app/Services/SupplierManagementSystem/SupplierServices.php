<?php

namespace App\Services\SupplierManagementSystem;

use App\Models\Item;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierServices
{

        public static function index()
        {
                try {
                        return response()->json(['message' => Supplier::get()], 200);
                } catch (\Exception $e) {
                        return response()->json(['message' => 'No Suppliers Found'], 400);
                }
        }

        public static function getActiveSuppliers()
        {
                try {
                        return response()->json(['message' => Supplier::where('is_approved', true)->get()], 200);
                } catch (\Exception $e) {
                        return response()->json(['message' => 'No Active Suppliers Found'], 400);
                }
        }

        public static function getNonActiveSuppliers()
        {
                try {
                        return response()->json(['message' => Supplier::where('is_approved', false)->get()], 200);
                } catch (\Exception $e) {
                        return response()->json(['message' => 'No NoN Active Suppliers Found'], 400);
                }
        }

        public static function addSupplier(Request $request)
        {
                try {
                        $type = ['local', 'international', 'government'];
                        $validate = $request->validate([
                                'name' => 'required',
                                'commerical_number' => 'required',
                                'type' => ['required', 'in:' . implode(',', $type)],
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
                        return response()->json([
                                'message' => 'Supplier Added Successfully',
                                'Supplier' => $add,
                        ], 200);
                } catch (\Exception $e) {
                        return response()->json($e->getMessage());
                }
        }

        public static function updateSupplierinfo(Request $request)
        {
                try {
                        $type = ['local', 'international', 'government'];
                        $validate = $request->validate([
                                'type' => ['required', 'in:' . implode(',', $type)]
                        ]);
                        $update = Supplier::where('id', $request->supplier_id)->update([
                                'name' => $request['name'],
                                'commerical_number' => $request['commerical_number'],
                                'type' => $validate['type'],
                                'address' => $request['address'],
                                'email' => $request['email'],
                                'is_approved' => $request->is_approved,
                                'notes' => $request['notes'],
                        ]);
                        return response()->json([
                                'message' => 'Supplier info Updated Successfully',
                                'Data' => $update,
                        ], 200);
                } catch (\Exception $e) {
                        return response()->json($e->getMessage());
                }
        }

        public static function approve(Request $request)
        {
                try {
                        $supplier = Supplier::where('id', $request->supplier_id)->first();
                        if (!$supplier) {
                                return response()->json(['message' => 'Supplier not found '], 400);
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
                } catch (\Exception $e) {
                        return response()->json($e->getMessage());
                }
        }



        public static function getSupplier(Request $request)
        {
                try {
                        return response()->json(['message' => Supplier::where('id', $request->supplier_id)->get()], 200);
                } catch (\Exception $e) {
                        return response()->json($e->getMessage());
                }
        }

        public static function getSupplierItem(Request $request)
        {
                try {
                        Supplier::where('id', $request->supplier_id)->first();
                        $items = Item::where('supplier_id', $request->supplier_id)->get();
                        if ($items->isEmpty()) {
                                return response()->json(['message' => 'the Items is empty'], 400);
                        }
                        return response()->json([
                                'message' => 'The Items That belongs to this supplier is ',
                                $items
                        ], 200);
                } catch (\Exception $e) {
                        return response()->json($e->getMessage());
                }
        }
}
