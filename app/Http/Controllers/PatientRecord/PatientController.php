<?php

namespace App\Http\Controllers\PatientRecord;

use App\Http\Controllers\Controller;
use App\Models\empatient;

use App\Models\Patient_file;
use App\Services\PatientRecord\PatientServices;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function add_patient(Request $request)
    {
        $add = PatientServices::add_patient($request);
        return response()->json(['message' => $add]);
    }


    public function transfer_empatient_dep(Request $request)
    {
        $trans = PatientServices::transfer_empatient_dep($request);
        return response()->json(['message' => $trans]);
    }


    public function transfer_patient_dep(Request $request)
    {
        $trans = PatientServices::transfer_patient_dep($request);
        return response()->json(['message' => $trans]);
    }


    public function Update_EMP_Info(Request $request)
    {
        $update = PatientServices::Update_EMP_Info($request);
        return response()->json(['message' => $update]);
    }


    public function Update_Info(Request $request)
    {
        $update = PatientServices::Update_Info($request);
        return response()->json(['message' => $update]);
    }


    public function patient_file(Request $request)
    {
        $file = PatientServices::patient_file($request);
        return response()->json(['message' => $file]);
    }


    public function test_result(Request $request)
    {

        $patient_file = Patient_file::where('patient_id', $request->patient_id)->where('department_id', $request->department_id)->first();
        if (!$patient_file) {

            return response()->json(['message' => 'this patient file is not exist !'], 401);
        }

        $update[] = Patient_file::where('patient_id', $request->patient_id)->where('department_id', $request->department_id)->update([

            'test_result' => $request->test_result,

        ]);

        return response()->json(['message' => 'Test result attached successfully!'], 200);
    }


    public function em_test_result(Request $request)
    {
        $patient = empatient::where('id', $request->id)->value('full_name');
        return response()->json(['message' => ' عزيزي المواطن' . $patient . ' يمكنك استلام تحاليلك الطارئة على شكل ورقيات'], 200);
    }



    public function X_ray_result(Request $request)
    {

        $patient_file = Patient_file::where('patient_id', $request->patient_id)->where('department_id', $request->department_id)->first();

        if (!$patient_file) {

            return response()->json(['message' => 'this patient file not exist!'], 401);
        }

        $update[] = Patient_file::where('patient_id', $request->patient_id)->where('department_id', $request->department_id)->update([

            'X_ray_result' => $request->X_ray_result,

        ]);

        return response()->json(['message' => 'X-ray attached successfully!'], 200);
    }


    public function em_X_ray_result(Request $request)
    {
        $patient = empatient::where('id', $request->id)->value('full_name');
        return response()->json(['message' => ' عزيزي المواطن ' . $patient . ' يمكنك استلام الصورة الشعاعية الخاصة بك مطبوعة'], 200);
    }



    public function searchbypatient(Request $request)
    {
        $patient_name = $request->input('patient_name');
        $search = Empatient::where('full_name', 'LIKE', '%' . $patient_name . '%')->get();
        return response()->json(['Search' => $search], 200);
    }

    public function all_empatient(Request $request)
    {
        $all = PatientServices::all_empatient($request);
        return response()->json(['message' => $all]);
    }

    public function all_patient(Request $request)
    {
        $all = PatientServices::all_patient($request);
        return response()->json(['message' => $all]);
    }
}
