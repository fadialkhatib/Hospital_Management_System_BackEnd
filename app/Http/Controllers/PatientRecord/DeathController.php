<?php

namespace App\Http\Controllers\PatientRecord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Death;
use App\Services\PatientRecord\DeathServices;

class DeathController extends Controller
{
    // Fetch all death records
    public function index()
    {
        $deaths = Death::all();
        return response()->json(['All Deaths' => $deaths], 200);
    }

    public function getByDate(Request $request)
    {
        $get = DeathServices::getByDate($request);
        return response()->json(['message' => $get]);
    }

    // Insert a new death record
    public function store(Request $request)
    {
        $store = DeathServices::store($request);
        return response()->json(['message' => $store]);
    }

    // Update an existing death record
    public function update(Request $request, $id)
    {
        $update = DeathServices::update($request, $id);
        return response()->json(['message' => $update]);
    }

    // Delete a death record
    public function destroy($id)
    {
        $destroy = DeathServices::destroy($id);
        return response()->json(['message' => $destroy]);
    }
}
