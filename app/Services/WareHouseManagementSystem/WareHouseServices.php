<?php

namespace App\Services\WareHouseManagementSystem;

use App\Events\InventoryChanged;
use App\Models\Cat_item;
use App\Models\Category;
use App\Models\Inventory_log;
use App\Models\Item;
use App\Models\Sub_category;
use App\Models\Supplier;
use App\Models\Tender;
use Illuminate\Http\Request;


class WareHouseServices
{

        public static function index()
        {
                $all = Item::get();
                if (!$all) {
                        return response()->json(['message' => 'the WareHouse is Empty!'], 401);
                }
                return response()->json(['All Items in the WareHouse' => $all], 200);
        }

        public static function all_categories()
        {
                $all = Category::get();
                if (!$all) {
                        return response()->json(['message' => 'there are no categories yet!'], 401);
                }
                return response()->json(['All Categories in the WareHouse' => $all], 200);
        }

        public static function all_subcategories()
        {
                $all = Sub_category::get();
                if (!$all) {
                        return response()->json(['message' => 'there are no subcategories yet!'], 401);
                }
                return response()->json(['All subCategories in the WareHouse' => $all], 200);
        }

        public static function all_item_in_cat(Request $request)
        {
                $items = Cat_item::where('category_id', $request->category_id)
                        ->where('sub_category_id', $request->sub_category_id)->get();
                foreach ($items as $item) {
                        $mat = Item::where('id', $item->item_id)->get();
                }
                return response()->json(['message' => $mat], 200);
        }

        public static function create_category(Request $request)
        {
                $validate = $request->validate([
                        'name' => 'required|string',
                        'description' => 'required'
                ]);
                $create = Category::create([
                        'name' => $validate['name'],
                        'description' => $validate['description']
                ]);
                return response()->json(['message' => $create, with('created successful')]);
        }

        public static function create_subcategory(Request $request)
        {
                $validate = $request->validate([
                        'name' => 'required|string',
                ]);
                $create = Sub_category::create([
                        'name' => $validate['name'],
                ]);
                return response()->json(['message' => $create, with('created successful')]);
        }

        public static function create_item(Request $request)
        {
                $category = Category::findOrFail($request->category_id);
                $sub = Sub_category::findOrFail($request->sub_category_id);
                $token = json_decode(base64_decode($request->header('token')));

                $validate = $request->validate([
                        'name' => 'required|string',
                        'code' => 'required',
                        'description' => 'required',
                        'barcode' => 'required',
                        'qr_code_path' => 'required',
                        'unit' => 'required',
                        'weight' => 'required',
                        'current_quantity' => 'required',
                        'min_quantity' => 'required',
                        'cost' => 'required',
                        'is_expirable' => 'required',
                        'supplier_id' => 'required'
                ]);
                $create = Item::create([
                        'name' => $validate['name'],
                        'code' => $validate['code'],
                        'description' => $validate['description'],
                        'barcode' => $validate['barcode'],
                        'qr_code_path' => $validate['qr_code_path'],
                        'unit' => $validate['unit'],
                        'weight' => $validate['weight'],
                        'current_quantity' => $validate['current_quantity'],
                        'min_quantity' => $validate['min_quantity'],
                        'cost' => $validate['cost'],
                        'is_expirable' => $validate['is_expirable'],
                        'supplier_id' => $validate['supplier_id'],
                ]);

                $log =  Inventory_log::create([
                        'item_id' => $create->id,
                        'action_type' => 'purchase',
                        'quantity' => $create->current_quantity,
                        'unit_cost' => $create->cost,
                        'total_cost' => (float)$create->cost * (float)$create->unit,
                        'reference_type' => Item::class,
                        'reference_id' => $create->id,
                        'notes' => $request->notes,
                        'department_id' => $token->id
                ]);




                $category->items()->attach($create->id, [
                        'sub_category_id' => $sub->id
                ]);


                return response()->json([
                        'the Item ' => $create,
                        'under category ' => $category,
                        'with sub ' => $sub,
                        'LOG' => $log,
                        with('created successful')
                ]);
        }

        public static function update_category(Request $request)
        {
                $update = Category::where('id', $request->category_id)->update([
                        'name' => $request['name'],
                        'description' => $request['description']
                ]);
                return response()->json(['message' => $update, with('updated successful')]);
        }

        public static function update_subcategory(Request $request)
        {
                $update = Sub_category::where('id', $request->subcategoey_id)->update([
                        'name' => $request['name'],
                ]);
                return response()->json(['message' => $update, with('updated successful')]);
        }

        public static function update_item(Request $request)
        {
                $token = json_decode(base64_decode($request->header('token')));
                $update = Item::where('id', $request->item_id)->update([
                        'name' => $request['name'],
                        'code' => $request['code'],
                        'description' => $request['description'],
                        'barcode' => $request['barcode'],
                        'qr_code_path' => $request['qr_code_path'],
                        'weight' => $request['weight'],
                        'current_quantity' => $request['current_quantity'],
                        'min_quantity' => $request['min_quantity'],
                        'cost' => $request['cost'],
                        'is_expirable' => $request['is_expirable'],
                        'supplier_id' => $request['supplier_id'],
                ]);

                $log =  Inventory_log::where('item_id', $request->item_id)->update([
                        'action_type' => 'adjustment',
                        'quantity' => $request['current_quantity'],
                        'unit_cost' => $request['cost'],
                        'total_cost' => (float)$request['cost'] * (float)$request->unit,
                        'reference_type' => Item::class,
                        'reference_id' => $request->item_id,
                        'notes' => 'no notes',
                        'department_id' => $token->id
                ]);


                $attach = Cat_item::where('item_id', $request->item_id)->update([
                        'category_id' => $request->category_id,
                        'sub_category_id' => $request->category_id,
                ]);
                return response()->json(['Updated' => $update, 'with category' => $request->category_id, with('updated successful')]);
        }

        public static function getCategory(Request $request)
        {
                $category = Category::where('id', $request->category_id)->first();
                if (!$category) {
                        return response()->json(['message' => 'No Category'], 400);
                }
                return response()->json(['message' => $category], 200);
        }

        public static function getSub(Request $request)
        {
                return response()->json(['message' => Sub_category::where('id', $request->sub_id)->first()]);
        }

        public static function getItem(Request $request)
        {
                return response()->json(['message' => Item::where('id', $request->item_id)->first()]);
        }

        public static function delete_category(Request $request)
        {
                Category::where('id', $request->category_id)->delete();
                return response()->json(['message' => 'category deleted successfully']);
        }

        public static function delete_subcategory(Request $request)
        {
                Sub_category::where('id', $request->sub_id)->delete();
                return response()->json(['message' => 'Subcategory deleted successfully']);
        }

        public static function delete_item(Request $request)
        {
                Item::where('id', $request->category_id)->delete();

                return response()->json(['message' => 'Item deleted successfully']);
        }


        public static function Search(Request $request)
        {
                try {
                        $search = $request->input('search');
                        $supplier = Supplier::where('name', 'LIKE', "%{$search}%")
                                ->orWhere('commerical_number', 'LIKE', "%{$search}%")
                                ->orWhere('type', 'LIKE', "%{$search}%")
                                ->orWhere('is_approved', 'LIKE', "%{$search}%")->get();

                        $item = Item::where('name', 'LIKE', "%{$search}%")
                                ->orWhere('description', 'LIKE', "%{$search}%")
                                ->orWhere('is_expirable', 'LIKE', "%{$search}%")->get();

                        $category = Category::where('name', 'LIKE', "%{$search}%")
                                ->orWhere('description', 'LIKE', "%{$search}%")->get();
                        $subCategory = Sub_category::where('name', 'LIKE', "%{$search}%")->get();

                        $tender = Tender::where('title', 'LIKE', "%{$search}%")
                                ->orWhere('tender_number', 'LIKE', "%{$search}%")
                                ->orWhere('status', 'LIKE', "%{$search}%")->get();

                        return response()->json([
                                'success' => true,
                                'search' => $search,
                                'data' => [
                                        'supplier' => $supplier,
                                        'item' => $item,
                                        'category' => $category,
                                        'subCategory' => $subCategory,
                                        'Tender' => $tender
                                ],
                                'meta' => [
                                        'supplier_count' => $supplier->count(),
                                        'item_count' => $item->count(),
                                        'category_count' => $category->count(),
                                        'subCategory_count' => $subCategory->count(),
                                        'tender_count' => $tender->count(),
                                        'total_results' => $item->count()  + $category->count() + $subCategory->count() + $tender->count()
                                ]
                        ]);
                } catch (\Exception $e) {
                        return response()->json(['success' => false, 'message' => $e->getMessage()]);
                }
        }
}
