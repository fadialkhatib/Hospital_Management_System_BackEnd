<?php

namespace App\Http\Controllers\TenderManagementSystem;

use App\Http\Controllers\Controller;
use App\Services\TenderManagementSystem\TenderServices;
use Illuminate\Http\Request;

class TenderController extends Controller
{
        public  function index()
        {
                return response()->json(TenderServices::index());
        }

        public  function getByCategory(Request $request)
        {

                return response()->json(TenderServices::getByCategory($request));
        }

        public  function getByStatus(Request $request)
        {

                return response()->json(TenderServices::getByStatus($request));
        }

        public  function NewTender(Request $request)
        {

                return response()->json(TenderServices::NewTender($request));
        }

        public  function tenderItemDetails(Request $request)
        {

                return response()->json(TenderServices::tenderItemDetails($request));
        }

        public  function UpdateTender(Request $request)
        {
                return response()->json(TenderServices::UpdateTender($request));
        }

        public  function getTender(Request $request)
        {
                return response()->json(['message' => TenderServices::getTender($request)]);
        }

        public  function DeleteTender()
        {
                return response()->json(TenderServices::DeleteTender());
        }

        public static function changeStatus(Request $request)
        {
                return response()->json(TenderServices::changeStatus($request));
        }
}
