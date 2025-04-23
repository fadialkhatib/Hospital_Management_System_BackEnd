<?php

namespace App\Services\SupplierManagementSystem;

use App\Models\Contract;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContractsServices
{

        public static function index()
        {
                return response()->json(['message' => Contract::get()], 200);
        }

        public static function getByTender(Request $request)
        {
                $contract = Contract::where('tender_id', $request->tender_id)->first();
                if ($contract->isEmpty()) {
                        return response()->json(['message' => 'no contract for this tender'], 400);
                }
                return response()->json(['message' => $contract], 200);
        }

        public static function getByBid(Request $request)
        {
                $contract = Contract::where('bid_id', $request->bid_id)->first();
                if ($contract->isEmpty()) {
                        return response()->json(['message' => 'no contract for this bid'], 400);
                }
                return response()->json(['message' => $contract], 200);
        }

        public static function getBysupplier(Request $request)
        {
                $contract = Contract::where('supplier_id', $request->supplier_id)->first();
                if ($contract->isEmpty()) {
                        return response()->json(['message' => 'no contract for this supplier'], 400);
                }
                return response()->json(['message' => $contract], 200);
        }

        public static function createContract(Request $request)
        {
                $status = ['draft', 'active', 'suspended', 'completed', 'terminated'];
                $validate = $request->validate([
                        'tender_id' => 'required',
                        'bid_id' => 'required',
                        'supplier_id' => 'required',
                        'contract_number' => 'required',
                        'start_date' => 'required',
                        'end_date' => 'required',
                        'total_amount' => 'required',
                        'status' => ['required', 'in:' . implode(',', $status)]
                ]);
                $create = Contract::create([
                        'tender_id' => $validate['tender_id'],
                        'bid_id' => $validate['bid_id'],
                        'supplier_id' => $validate['supplier_id'],
                        'contract_number' => $validate['contract_number'],
                        'start_date' => $validate['start_date'],
                        'end_date' => $validate['end_date'],
                        'total_amount' => $validate['total_amount'],
                        'status' => $validate['status'],
                        'barcode' => $request['barcode'],
                ]);
                return response()->json(['message' => 'Contract created successfully'], 200);
        }

        public static function updateContract(Request $request)
        {
                $status = ['draft', 'active', 'suspended', 'completed', 'terminated'];
                $validate = $request->validate([
                        'status' => ['required', 'in:' . implode(',', $status)]
                ]);
                $update = Contract::where('id', $request->contract_id)->update([
                        'tender_id' => $request['tender_id'],
                        'bid_id' => $request['bid_id'],
                        'supplier_id' => $request['supplier_id'],
                        'contract_number' => $request['contract_number'],
                        'start_date' => $request['start_date'],
                        'end_date' => $request['end_date'],
                        'total_amount' => $request['total_amount'],
                        'status' => $validate['status'],
                        'barcode' => $request['barcode'],
                ]);
                return response()->json(['message' => 'Contract updated successfully'], 200);
        }

        public static function getContract(Request $request)
        {
                return response()->json(['message' => Contract::where('id', $request->id)->first()]);
        }

        public static function deleteContract()
        {
                $delete = Contract::whereDate('end_date', '<=', Carbon::now())
                        ->orWhere('status', 'terminated')->delete();
                if ($delete >= 0) {
                        return response()->json(['message' => 'contract deleted successfully'], 200);
                }
                return response()->json(['message' => 'no contract to delete'], 400);
        }

        public static function changeStatus(Request $request)
        {
                $status = ['draft', 'active', 'suspended', 'completed', 'terminated'];
                $validate = $request->validate([
                        'status' => ['required', 'in:' . implode(',', $status)]
                ]);
                $Contract = Contract::where('id', $request->contract_id)->update([
                        'status' => $validate['status']
                ]);
                return response()->json(['message' => 'status updated to ' . $Contract], 200);
        }
}
