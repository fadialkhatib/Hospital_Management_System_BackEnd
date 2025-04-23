<?php

namespace App\Http\Controllers\PatientRecord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Birth;
use App\Services\PatientRecord\BirthServices;

class BirthController extends Controller
{
    // Fetch all birth records
    public function index()
    {
        $births = Birth::all();
        return response()->json(['All Birth' => $births], 200);
    }


    // Fetch birth records for a specific date
    public function getByDate(Request $request)
    {
        $get = BirthServices::getByDate($request);
        return response()->json(['message' => $get]);
    }


    // Insert a new birth record
    public function store(Request $request)
    {
        $store = BirthServices::store($request);
        return response()->json(['message' => $store]);
    }


    // Update an existing birth record
    public function update(Request $request, $id)
    {
        $update = BirthServices::update($request, $id);
        return response()->json(['message' => $update]);
    }


    // Delete a birth record
    public function destroy($id)
    {
        $destroy = BirthServices::destroy($id);
        return response()->json(['message' => $destroy]);
    }
}
