<?php

namespace App\Http\Controllers\SupplierManagementSystem;

use App\Http\Controllers\Controller;
use App\Services\SupplierManagementSystem\ContractsServices;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public static function index()
    {
        return response()->json(ContractsServices::index());
    }

    public static function getByTender(Request $request)
    {
        return response()->json(ContractsServices::getByTender($request));
    }

    public static function getByBid(Request $request)
    {
        return response()->json(ContractsServices::getByBid($request));
    }

    public static function getBysupplier(Request $request)
    {
        return response()->json(ContractsServices::getBysupplier($request));
    }

    public static function createContract(Request $request)
    {
        return response()->json(ContractsServices::createContract($request));
    }

    public static function updateContract(Request $request)
    {
        return response()->json(ContractsServices::updateContract($request));
    }

    public  function getContract(Request $request)
    {
        return response()->json(['message' => ContractsServices::getContract($request)]);
    }

    public static function deleteContract()
    {
        return response()->json(ContractsServices::deleteContract());
    }

    public static function changeStatus(Request $request)
    {
        return response()->json(ContractsServices::getByTender($request));
    }
}
