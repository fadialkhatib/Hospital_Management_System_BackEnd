<?php

namespace App\Services\PatientRecord;

use App\Models\Birth;
use Illuminate\Http\Request;

class BirthServices
{

        public static function getByDate(Request $request)
        {
                $date = $request->input('date');
                $births = Birth::where('birth_date', $date)->get();
                if (!$births) {
                        return response()->json(['message' => 'there is no Birth in this date !'], 402);
                }

                return response()->json(['Births By Day' => $births], 200);
        }


        // Insert a new birth record
        public static function store(Request $request)
        {
                $birth = new Birth();
                $birth->name = $request->input('name');
                $birth->father_name = $request->input('father_name');
                $birth->mother_name = $request->input('mother_name');
                $birth->birth_date = $request->input('birth_date');
                $birth->city = $request->input('city');
                $birth->national_id = $request->input('national_id');
                $birth->save();
                return response()->json(['The new Birth' => $birth, 'Message' => 'The new Birth Stored Successfully!'], 200);
        }

        // Update an existing birth record
        public static function update(Request $request, $id)
        {
                $birth = Birth::find($id);
                $birth->name = $request->input('name');
                $birth->father_name = $request->input('father_name');
                $birth->mother_name = $request->input('mother_name');
                $birth->birth_date = $request->input('birth_date');
                $birth->city = $request->input('city');
                $birth->national_id = $request->input('national_id');
                $birth->save();
                return response()->json(['The Birth update is' => $birth], 200);
        }

        // Delete a birth record
        public static function destroy($id)
        {
                $birth = Birth::find($id);
                $birth->delete();
                return response()->json(['message' => 'Birth record deleted'], 200);
        }
}

//ser