<?php

namespace App\Http\Controllers\TenderManagementSystem;

use App\Http\Controllers\Controller;
use App\Services\TenderManagementSystem\BidServices;
use Illuminate\Http\Request;

class BidController extends Controller
{
    public  function index()
    {
        return response()->json(BidServices::index());
    }

    public  function getBySupplier(Request $request)
    {
        return response()->json(BidServices::getBySupplier($request));
    }

    public static function getByStatus(Request $request)
    {
        return response()->json(BidServices::getByStatus($request));
    }


    public static function getByTender()
    {
        return response()->json(BidServices::getByTender());
    }


    public static function craete_bid(Request $request)
    {
        return response()->json(BidServices::craete_bid($request));
    }

    public static function update_bid(Request $request)
    {
        return response()->json(BidServices::update_bid($request));
    }

    public  function getBid(Request $request)
    {
        return response()->json(['message' => BidServices::getBid($request)]);
    }

    public static function delete_Bid()
    {
        return response()->json(BidServices::delete_Bid());
    }

    public static function changeStatus(Request $request)
    {
        return response()->json(BidServices::changeStatus($request));
    }
}
