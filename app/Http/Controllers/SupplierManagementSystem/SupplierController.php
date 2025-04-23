<?php

namespace App\Http\Controllers\SupplierManagementSystem;

use App\Http\Controllers\Controller;
use App\Services\SupplierManagementSystem\SupplierServices;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public  function index()
    {
        return response()->json(['message' => SupplierServices::index()]);
    }

    public  function getActiveSuppliers()
    {
        return response()->json(['message' => SupplierServices::getActiveSuppliers()]);
    }

    public  function getNonActiveSuppliers()
    {
        return response()->json(['message' => SupplierServices::getNonActiveSuppliers()]);
    }

    public  function addSupplier(Request $request)
    {

        return response()->json(['message' => SupplierServices::addSupplier($request)]);
    }

    public  function updateSupplierinfo(Request $request)
    {


        return response()->json(['message' => SupplierServices::updateSupplierinfo($request)]);
    }

    public  function approve(Request $request)
    {
        return response()->json(['message' => SupplierServices::approve($request)]);
    }


    public  function getSupplier(Request $request)
    {
        return response()->json(['message' => SupplierServices::getSupplier($request)]);
    }

    public  function getSupplierItem(Request $request)
    {
        return response()->json(['message' => SupplierServices::getSupplierItem($request)]);
    }
}
