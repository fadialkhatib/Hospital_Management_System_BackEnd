<?php

namespace App\Services;

use App\Models\Cat_item;
use App\Models\Category;
use App\Models\Item;
use App\Models\Sub_category;
use Illuminate\Http\Request;


class WareHouseServices
{

        public static function index()
        {
                $all = Item::all();
                if (!$all) {
                        return response()->json(['message' => 'the WareHouse is Empty!'], 401);
                }
                return response()->json(['All Items in the WareHouse' => $all], 200);
        }

        public static function all_categories()
        {
                $all = Category::all();
                if (!$all) {
                        return response()->json(['message' => 'there are no categories yet!'], 401);
                }
                return response()->json(['All Categories in the WareHouse' => $all], 200);
        }

        public static function all_subcategories()
        {
                $all = Sub_category::all();
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
                        'description' => 'required|text'
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




                $category->items()->attach($create->id, [
                        'sub_category_id' => $sub->id
                ]);


                return response()->json([
                        'the Item ' => $create,
                        'under category ' => $category,
                        'with sub ' => $sub,
                        with('created successful')
                ]);
        }

        public static function update_category(Request $request)
        {
                $update = Category::where('id', $request->categoey_id)->update([
                        'name' => $request['name'],
                        'description' => $request['description']
                ]);
                return response()->json(['message' => $update, with('updated successful')]);
        }

        public static function update_subcategory(Request $request)
        {
                $update = Sub_category::where('id', $request->subcategoey_id)->update([
                        'name' => $request['name'],
                        'description' => $request['description']
                ]);
                return response()->json(['message' => $update, with('updated successful')]);
        }

        public static function update_item(Request $request)
        {
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
                return response()->json(['message' => $update, with('updated successful')]);
        }

        public static function delete_category(Request $request)
        {
                Category::where('id', $request->category_id)->delete();
                return response()->json(['message' => 'category deleted successfully']);
        }

        public static function delete_subcategory(Request $request)
        {
                Sub_category::where('id', $request->category_id)->delete();
                return response()->json(['message' => 'category deleted successfully']);
        }

        public static function delete_item(Request $request)
        {
                Item::where('id', $request->category_id)->delete();
                return response()->json(['message' => 'category deleted successfully']);
        }
}
