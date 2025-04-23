<?php

namespace App\Services\TenderManagementSystem;

use App\Models\Bid;
use App\Models\Bid_item;
use App\Models\Tender_item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BidServices
{

        public static function index()
        {
                return response()->json(['message' => Bid::get()], 200);
        }

        public static function getBySupplier(Request $request)
        {
                $bids = Bid::where('supplier_id', $request->supplier_id)->get();
                if ($bids->isEmpty()) {
                        return response()->json(['message' => 'there is no bids for this supplier'], 400);
                }
                return response()->json(['message' => $bids], 200);
        }

        public static function getByStatus(Request $request)
        {
                $status = ['draft', 'submitted', 'under_technical_evaluation', 'under_financial_evaluation', 'accepted', 'rejected'];
                $validate = $request->validate([
                        'status' => ['required', 'in:' . implode(',', $status)]
                ]);
                $bids = Bid::where('status', $validate['status'])->get();
                if ($bids->isEmpty()) {
                        return response()->json(['message' => 'no bids in this status'], 400);
                }
                return response()->json(['message' => $bids], 200);
        }


        public static function getByTender()
        {
                $bids = Bid_item::select('bid_items.*', 'tenders.*')
                        ->join('tender_items', 'tender_items.id', '=', 'bid_items.tender_item_id')
                        ->join('tenders', 'tenders.id', '=', 'tender_items.tender_id')
                        ->get();
                if ($bids->isEmpty()) {
                        return response()->json(['message' => 'there is no bids for this supplier'], 400);
                }
                return response()->json(['message' => $bids], 200);
        }


        public static function craete_bid(Request $request)
        {
                $status = ['draft', 'submitted', 'under_technical_evaluation', 'under_financial_evaluation', 'accepted', 'rejected'];
                $validate = $request->validate([
                        'tender_id' => 'required',
                        'supplier_id' => 'required',
                        'bid_number' => 'required',
                        'total_amount' => 'required',
                        'currency' => 'required',
                        'valid_until' => 'required',
                        'status' => ['required', 'in:' . implode(',', $status)],
                ]);

                $create = Bid::create([
                        'tender_id' => $validate['tender_id'],
                        'supplier_id' => $validate['supplier_id'],
                        'bid_number' => $validate['bid_number'],
                        'total_amount' => $validate['total_amount'],
                        'tax_amount' => $request['tax_amount'],
                        'discount_amount' => $request['discount_amount'],
                        'currency' => $validate['currency'],
                        'valid_until' => $validate['valid_until'],
                        'status' => $validate['status'],
                        'notes' => $request['notes'],
                ]);
                $details = Bid_item::create([
                        'bid_id' => $create->id,
                        'tender_item_id' => Tender_item::where('tender_id', $create->tender_id)->value('id'),
                        'unit_price' => $request->unit_price,
                        'total_price' => $request->total_price,
                        'currency' => $request->currency,
                        'notes' => $request->notes,

                ]);
                return response()->json(['message' => 'Bid created successfully'], 200);
        }

        public static function update_bid(Request $request)
        {
                $status = ['draft', 'submitted', 'under_technical_evaluation', 'under_financial_evaluation', 'accepted', 'rejected'];
                $validate = $request->validate([
                        'status' => ['required', 'in:' . implode(',', $status)]
                ]);
                $update = Bid::where('id', $request->bid_id)->update([
                        'tender_id' => $request['tender_id'],
                        'supplier_id' => $request['supplier_id'],
                        'bid_number' => $request['bid_number'],
                        'total_amount' => $request['total_amount'],
                        'tax_amount' => $request['tax_amount'],
                        'discount_amount' => $request['discount_amount'],
                        'currency' => $request['currency'],
                        'valid_until' => $request['valid_until'],
                        'status' => $validate['status'],
                        'notes' => $request['notes'],
                ]);
                $details = Bid_item::where('bid_id', $request->bid_id)->update([
                        'bid_id' => $update->id,
                        'tender_item_id' => Tender_item::where('tender_id', $update->tender_id)->value('id'),
                        'unit_price' => $request->unit_price,
                        'total_price' => $request->total_price,
                        'currency' => $request->currency,
                        'notes' => $request->notes
                ]);
                return response()->json(['message' => 'Bid created successfully'], 200);
        }

        public static function getBid(Request $request)
        {
                $bid = Bid::where('id', $request->bid_id)->first();
                if ($bid->is_Empty()) {
                        return response()->json(['message' => 'no bid select'], 400);
                }
                $details = Bid_item::where('bid_id', $request->bid_id)->first();
                if ($details->is_Empty()) {
                        return response()->json(['message' => 'no bid details'], 400);
                }
                return response()->json(['Bid ' => $bid, ' Details ' => $details], 200);
        }

        public static function delete_Bid()
        {
                $bid = Bid::whereDate('valid_until', '<=', Carbon::now())
                        ->orWhere('status', 'rejected')->delete();
                if ($bid > 0) {
                        return response()->json(['message' => 'Bid deleted successfully'], 200);
                }
                return response()->json(['message' => 'No bids found to delete'], 404);
        }

        public static function changeStatus(Request $request)
        {
                $status = ['draft', 'submitted', 'under_technical_evaluation', 'under_financial_evaluation', 'accepted', 'rejected'];
                $validate = $request->validate([
                        'status' => ['required', 'in:' . implode(',', $status)]
                ]);
                $bid = Bid::where('id', $request->bid_id)->update([
                        'status' => $validate['status']
                ]);
                return response()->json(['message' => 'status updated to ' . $bid], 200);
        }
}
