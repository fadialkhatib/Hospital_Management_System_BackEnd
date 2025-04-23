<?php

namespace App\Http\Controllers\WareHouseManagementSystem;

use App\Http\Controllers\Controller;
use App\Services\WareHouseManagementSystem\WareHouseLogServices;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function Logs()
    {
        return response()->json(WareHouseLogServices::Logs());
    }

    public  function logsByAction(Request $request)
    {
        return response()->json(WareHouseLogServices::logsByAction($request));
    }

    public  function getLog(Request $request)
    {
        return response()->json(['message' => WareHouseLogServices::getLog($request)]);
    }
}
