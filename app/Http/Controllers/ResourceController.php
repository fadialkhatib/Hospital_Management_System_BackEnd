<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource;
use ResourceServices;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::all();
        return response()->json(['All Resource'=>$resources],200);
    }

    public function store(Request $request)
    {
        $store = ResourceServices::store($request);
        return response()->json(['message'=>$store]);
    }

    public function show($id)
    {
        $show = ResourceServices::show($id);
        return response()->json(['message'=>$show]);
    }

    public function update(Request $request)
    {
        $update = ResourceServices::update($request);
        return response()->json(['message'=>$update]);
    }

    public function destroy(Request $request)
    {
        $destroy = ResourceServices::destroy($request);
        return response()->json(['message'=>$destroy]);
    }
}
