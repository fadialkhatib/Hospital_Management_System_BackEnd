<?php

namespace App\Http\Controllers\SupplierManagementSystem;

use App\Http\Controllers\Controller;
use App\Services\SupplierManagementSystem\SupplierServices;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public  function index()
    {
        return response()->json(SupplierServices::index());
    }

    public  function getActiveSuppliers()
    {
        return response()->json(SupplierServices::getActiveSuppliers());
    }

    public  function getNonActiveSuppliers()
    {
        return response()->json(SupplierServices::getNonActiveSuppliers());
    }

    public  function addSupplier(Request $request)
    {

        return response()->json(SupplierServices::addSupplier($request));
    }

    public  function updateSupplierinfo(Request $request)
    {


        return response()->json(SupplierServices::updateSupplierinfo($request));
    }

    public  function approve(Request $request)
    {
        return response()->json(SupplierServices::approve($request));
    }


    public  function getSupplier(Request $request)
    {
        return response()->json(SupplierServices::getSupplier($request));
    }

    public  function getSupplierItem(Request $request)
    {
        return response()->json(SupplierServices::getSupplierItem($request));
    }
}
