<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use EquipmentServices;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipment = Equipment::all();
        return response()->json(['All Equipment'=>$equipment],200);
    }

    public function store(Request $request)
    {
        $store = EquipmentServices::store($request);
        return response()->json(['message'=>$store]);
    }

    public function show($id)
    {
        $show = EquipmentServices::show($id);
        return response()->json(['message'=>$show]);
    }

    public function update(Request $request)
    {
        $update = EquipmentServices::update($request);
        return response()->json(['message'=>$update]);
    }

    public function destroy($id)
    {
        $destroy = EquipmentServices::destroy($id);
        return response()->json(['message'=>$destroy]);
    }
}
