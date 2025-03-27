<?php

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceServices{
        public static function store(Request $request)
        {
                $resource = Resource::create($request->all());
                return response()->json(['New Resource'=>$resource], 200);
        }

        public static function show($id)
        {
                $resource = Resource::findOrFail($id);
                return response()->json(['This Resource'=>$resource],200);
        }

        public static function update(Request $request)
        {

                $resource = Resource::find($request->id);
                $resource->update($request->all());
                return response()->json(['The Resource Update'=>$resource], 200);
        }

        public static function destroy(Request $req)
        {
                Resource::destroy($req->id);
                return response()->json(['Message'=>'Resource Deleted successfully!'], 200);
        }
}