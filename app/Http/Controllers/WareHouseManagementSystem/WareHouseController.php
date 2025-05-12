<?php

namespace App\Http\Controllers\WareHouseManagementSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\WareHouseManagementSystem\WareHouseServices;

class WareHouseController extends Controller
{
        public static function index()
        {
                $all = WareHouseServices::index();
                return response()->json($all);
        }

        public static function all_categories()
        {
                $all = WareHouseServices::all_categories();
                return response()->json($all);
        }

        public static function all_subcategories()
        {
                $all = WareHouseServices::all_subcategories();
                return response()->json($all);
        }

        public static function all_item_in_cat(Request $request)
        {
                $all = WareHouseServices::all_item_in_cat($request);
                return response()->json($all);
        }

        public static function create_category(Request $request)
        {
                $create = WareHouseServices::create_category($request);
                return response()->json($create);
        }

        public static function create_subcategory(Request $request)
        {
                $create = WareHouseServices::create_subcategory($request);
                return response()->json(['message' => $create]);
        }

        public static function create_item(Request $request)
        {
                $create = WareHouseServices::create_item($request);
                return response()->json(['message' => $create]);
        }

        public static function update_category(Request $request)
        {
                $update = WareHouseServices::update_category($request);
                return response()->json($update);
        }

        public static function update_subcategory(Request $request)
        {
                $update = WareHouseServices::update_subcategory($request);
                return response()->json($update);
        }

        public static function update_item(Request $request)
        {
                $update = WareHouseServices::update_item($request);
                return response()->json($update);
        }

        public  function getCategory(Request $request)
        {
                return response()->json(['message' => WareHouseServices::getCategory($request)]);
        }

        public  function getSub(Request $request)
        {
                return response()->json(['message' => WareHouseServices::getSub($request)]);
        }

        public  function getItem(Request $request)
        {
                return response()->json(['message' => WareHouseServices::getItem($request)]);
        }

        public function delete_category(Request $request)
        {
                $delete = WareHouseServices::delete_category($request);
                return response()->json($delete);
        }

        public function delete_subcategory(Request $request)
        {
                $delete = WareHouseServices::delete_subcategory($request);
                return response()->json($delete);
        }

        public function delete_item(Request $request)
        {
                $delete = WareHouseServices::delete_item($request);
                return response()->json($delete);
        }

        public function Search(Request $request)
        {
                return response()->json(WareHouseServices::Search($request));
        }

        public function approve(Request $request)
        {
                return response()->json(WareHouseServices::approve($request));
        }
}
