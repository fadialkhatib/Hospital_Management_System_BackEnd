<?php

namespace App\Http\Controllers\PatientRecord;

use App\Http\Controllers\Controller;
use App\Models\Empatient;
use App\Models\EmSurgery;
use App\Models\Patient;
use App\Models\Surgery;
use Illuminate\Http\Request;

class SurgeryController extends Controller
{
    public function Add_emsurgery(Request $request)
    {
        try {
            $patient = Empatient::where('id', $request->patient_id)->value('id');
            if (!$patient) {
                return response()->json(['message' => 'this patient is not exist in emergency department!'], 401);
            }
            $add_to_surgery = EmSurgery::create([
                'patient_id' => $patient
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
        return response()->json(['message' => 'the patient with id' . $patient . ' has been in the emergency surgery queue'], 200);
    }



    public function Add_surgery(Request $request)
    {
        try {
            $patient = Patient::where('id', $request->patient_id)->value('id');
            if (!$patient) {
                return response()->json(['message' => 'this patient is not exist in any department!'], 401);
            }
            $add_to_surgery = Surgery::create([
                'patient_id' => $patient
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
        return response()->json(['message' => 'the patient with id' . $patient . 'has been in the emergency surgery queue'], 200);
    }

    public function em_surgey_queue()
    {
        $all =  EmSurgery::with('patient')->get();
        if ($all->isEmpty()) {
            return response()->json(['there is no patient in emergency surgery department!'], 401);
        }
        return response()->json(['All patient in emergency surgry queue' => $all], 200);
    }

    public function surgey_queue()
    {
        $all =  Surgery::with('patient')->get();
        if ($all->isEmpty()) {
            return response()->json(['Message' => 'there is no patient in surgery department!'], 401);
        }
        return response()->json(['All patient in surgry queue' => $all], 200);
    }

    public function get_p_from_surgeryqueue(Request $request)
    {
        try {
            $patient = Surgery::where('patient_id', $request->patient_id)->first();
            if (!$patient) {
                return response()->json(['messgae' => 'this patient is out of the queue'], 401);
            }
            $patient_name = patient::where('id', $patient->patient_id)->value('full_name');
            $patient->delete();
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
        return response()->json(['message' => 'this patient with name ' . $patient_name . '  is turn!'], 200);
    }

    public function get_emp_from_surgeryqueue(Request $request)
    {
        try {
            $patient = EmSurgery::where('patient_id', $request->patient_id)->first();
            if (!$patient) {
                return response()->json(['messgae' => 'this patient is out of the queue'], 401);
            }
            $patient_name = Empatient::where('id', $patient->patient_id)->value('full_name');
            $patient->delete();
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
        return response()->json(['message' => 'this patient with name ' . $patient_name . '  is turn!'], 200);
    }
}
