<?php

namespace App\Services\TenderManagementSystem;

use App\Models\Item;
use App\Models\Tender;
use App\Models\Tender_item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TenderServices
{

        public static function index()
        {
                try {
                        return response()->json(['message' => Tender::get()], 200);
                } catch (\Exception $e) {
                        return response()->json(['message' => 'No Tenders Yet']);
                }
        }

        public static function getByCategory(Request $request)
        {
                try {
                        $tenders = Tender::where('category_id', $request->category_id)->get();
                        if ($tenders->isEmpty()) {
                                return response()->json(['message' => 'tenders in this category is empty'], 400);
                        }
                        return response()->json(['message' => $tenders], 200);
                } catch (\Exception $e) {
                        return response()->json(['message' => $e->getMessage()], 400);
                }
        }

        public static function getByStatus(Request $request)
        {
                try {
                        $status = ['draft', 'published', 'under_evaluation', 'awarded', 'canceled'];
                        $validated = $request->validate([
                                'status' => ['required', 'in:' . implode(',', $status)]
                        ]);
                        $tenders = Tender::where('status', $validated['status'])->get();
                        if ($tenders->isEmpty()) {
                                return response()->json(['message' => 'no tenders in this status'], 400);
                        }
                        return response()->json(['message' => $tenders], 200);
                } catch (\Exception $e) {
                        return response()->json(['message' => $e->getMessage()], 400);
                }
        }

        public static function NewTender(Request $request)
        {
                try {
                        $status = ['draft', 'published', 'under_evaluation', 'awarded', 'canceled'];
                        $validate = $request->validate([
                                'title' => 'required',
                                'tender_number' => 'required',
                                'description' => 'required',
                                'closing_date' => 'required',
                                'budget' => 'required',
                                'status' => ['required', 'in:' . implode(',', $status)],
                                'barcode' => 'required',
                                'category_id' => 'required'
                        ]);

                        $tender = Tender::create([
                                'title' => $validate['title'],
                                'tender_number' => $validate['tender_number'],
                                'description' => $validate['description'],
                                'release_date' => Carbon::today(),
                                'closing_date' => $validate['closing_date'],
                                'budget' => $validate['budget'],
                                'status' => $validate['status'],
                                'barcode' => $validate['barcode'],
                                'category_id' => $validate['category_id']
                        ]);
                        $item_name = Item::where('id', $request->item_id)->value('name');
                        $tender_item = Tender_item::create([
                                'tender_id' => $tender->id,
                                'item_id' => $request->item_id,
                                'item_name' => $item_name,
                                'description' => $request->description,
                                'quantity' => $request->quantity,
                                'unit' => $request->unit,
                                'specifications' => $request->specifications,
                                'unit_price' => $request->unit_price,
                                'total_price' => (float)$request->quantity * (float)$request->unit_price
                        ]);
                        return response()->json([
                                'message' => 'A New Tender Added successfully',
                                'Tender' => $tender,
                                'Details' => $tender_item,
                        ], 200);
                } catch (\Exception $e) {
                        return response()->json(['message' => $e->getMessage()], 400);
                }
        }

        public static function tenderItemDetails(Request $request)
        {
                $tender = Tender::where('id', $request->tender_id)->first();
                if (!$tender) {
                        return response()->json(['message' => 'tenders in this category is empty'], 400);
                }
                $details = Tender_item::where('id', $request->tender_id)->first();
                if (!$details) {
                        return response()->json(['message' => 'no details'], 400);
                }
                return response()->json(['Tender' => $tender, 'Details' => $details], 200);
        }

        public static function UpdateTender(Request $request)
        {
                try {
                        $status = ['draft', 'published', 'under_evaluation', 'awarded', 'canceled'];
                        $validate = $request->validate([
                                'status' => ['required', 'in:' . implode(',', $status)]
                        ]);
                        Tender::where('id', $request->tender_id)->update([
                                'title' => $request['title'],
                                'tender_number' => $request['tender_number'],
                                'description' => $request['description'],
                                'release_date' => Carbon::today(),
                                'closing_date' => $request['closing_date'],
                                'budget' => $request['budget'],
                                'status' => $validate['status'],
                                'barcode' => $request['barcode'],
                                'category_id' => $request['category_ids']
                        ]);
                        $item_name = Item::where('id', $request->item_id)->value('name');
                        Tender_item::where('tender_id', $request->tender_id)->update([
                                'item_id' => $request->item_id,
                                'item_name' => $item_name,
                                'description' => $request->description,
                                'quantity' => $request->quantity,
                                'unit' => $request->unit,
                                'specifications' => $request->specifications,
                                'unit_price' => $request->unit_price,
                                'total_price' => (float)$request->quantity * (float)$request->unit_price
                        ]);
                        return response()->json(['message' => 'Tender updated successfully'], 200);
                } catch (\Exception $e) {
                        return response()->json(['message' => $e->getMessage()], 400);
                }
        }

        public static function getTender(Request $request)
        {
                try {
                        $tender = Tender::where('id', $request->tender_id)->first();
                        if (!$tender) {
                                return response()->json(['message' => 'no tender select'], 400);
                        }
                        $details = Tender_item::where('tender_id', $request->tender_id)->first();
                        if (!$details) {
                                return response()->json(['message' => 'no tender details'], 400);
                        }
                        return response()->json([
                                'Tender ' => $tender,
                                ' Details ' => $details
                        ], 200);
                } catch (\Exception $e) {
                        return response()->json(['message' => $e->getMessage()], 400);
                }
        }

        public static function DeleteTender()
        {
                try {
                        $deletedCount = Tender::whereDate('closing_date', '<=', Carbon::today())
                                ->orWhere('status', 'canceled')->delete(); //اصغر او يساوي لانو ممكن تكون ق=في صفقات مغلقة قبل

                        if ($deletedCount > 0) {
                                return response()->json(['message' => $deletedCount . ' tenders deleted successfully'], 200);
                        }

                        return response()->json(['message' => 'No tenders found to delete'], 404);
                } catch (\Exception $e) {
                        return response()->json(['message' => $e->getMessage()], 400);
                }
        }

        public static function changeStatus(Request $request)
        {
                try {
                        $status = ['draft', 'published', 'under_evaluation', 'awarded', 'canceled'];
                        $validate = $request->validate([
                                'status' => ['required', 'in:' . implode(',', $status)]
                        ]);
                        $tender = Tender::where('id', $request->tender_id)->update([
                                'status' => $validate['status']
                        ]);
                        return response()->json(['message' => 'status updated to ' . $tender], 200);
                } catch (\Exception $e) {
                        return response()->json(['message' => $e->getMessage()], 400);
                }
        }
}
