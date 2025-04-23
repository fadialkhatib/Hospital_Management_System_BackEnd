<?php

namespace App\Services\PatientRecord;

use App\Models\Death;
use Illuminate\Http\Request;

class DeathServices
{

        public static function getByDate(Request $request)
        {
                $date = $request->input('date');
                $deaths = Death::where('death_date', $date)->get();
                if (!$deaths) {
                        return response()->json(['message' => 'there is no deaths in this date !'], 402);
                }
                return response()->json(['Deaths By Day' => $deaths]);
        }

        // Insert a new death record
        public static function store(Request $request)
        {
                $death = new Death();
                $death->name = $request->input('name');
                $death->father_name = $request->input('father_name');
                $death->mom_name = $request->input('mom_name');
                $death->birth_date = $request->input('birth_date');
                $death->city = $request->input('city');
                $death->National_id = $request->input('National_id');
                $death->death_date = $request->input('death_date');
                $death->death_hour = $request->input('death_hour');
                $death->reason_of_death = $request->input('reason_of_death');
                $death->save();

                return response()->json(['The new Death' => $death, 'Message' => 'The new Death Stored Successfully!'], 200);
        }

        // Update an existing death record
        public static function update(Request $request, $id)
        {
                $death = Death::find($id);
                $death->name = $request->input('name');
                $death->father_name = $request->input('father_name');
                $death->mom_name = $request->input('mom_name');
                $death->birth_date = $request->input('birth_date');
                $death->city = $request->input('city');
                $death->National_id = $request->input('National_id');
                $death->death_date = $request->input('death_date');
                $death->death_hour = $request->input('death_hour');
                $death->reason_of_death = $request->input('reason_of_death');
                $death->save();

                return response()->json(['The Death update is' => $death], 200);
        }

        // Delete a death record
        public static function destroy($id)
        {
                $death = Death::find($id);
                $death->delete();

                return response()->json(['message' => 'Death record deleted'], 200);
        }
}
