<?php

namespace App\Services\PatientRecord;

use App\Models\BelongToDep;
use App\Models\Department;
use App\Models\EmArchive;
use App\Models\Empatient;
use App\Models\EMPBelongTo;
use App\Models\EMPTransfarOperation;
use App\Models\Patient;
use App\Models\Patient_file;
use App\Models\TransfarOperation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientServices
{


        public static function create_patient(Request $request)
        {
                $blood_type = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
                try {
                        $validate = $request->validate([
                                'full_name' => 'required',
                                'address'  => 'required',
                                'date_of_birth' => 'required|date',
                                'mom_name' => 'required',
                                'chain' => 'required|integer',
                                'gender' => 'required',
                                'case_description' => 'required',
                                'treatment_required' => 'required',
                                'chronic_diseases' => 'required',
                                'blood_type' => 'required',
                                'in :' . implode(',', $blood_type)
                        ]);
                        $token = json_decode(base64_decode($request->header('token')));
                        $patient = Patient::create([
                                'full_name' => $validate['full_name'],
                                'address' => $validate['address'],
                                'date_of_birth' => $validate['date_of_birth'],
                                'mom_name' => $validate['mom_name'],
                                'chain' => $validate['chain'],
                                'gender' => $validate['gender'],
                                'case_description' => $validate['case_description'],
                                'treatment_required' => $validate['treatment_required'],
                                'chronic_diseases' => $validate['chronic_diseases'],
                                'blood_type' => $validate['blood_type'],
                        ]);
                        $belongs = new BelongToDep();
                        $belongs->patient_id = $patient->id;
                        $belongs->dep_id = $token->id;
                        $belongs->save();
                } catch (\Exception $e) {
                        return response()->json([$e->getMessage()]);
                }
                return ($patient);
        }


        public static function add_patient(Request $request)
        {
                $blood_type = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];

                try {
                        $validate = $request->validate([
                                'full_name' => 'required',
                                'address'  => 'required',
                                'date_of_birth' => 'required|date',
                                'mom_name' => 'required',
                                'chain' => 'required|integer',
                                'gender' => 'required',
                                'case_description' => 'required',
                                'treatment_required' => 'required',
                                'chronic_diseases' => 'required',
                                'blood_type' => 'required|in:' . implode(',', $blood_type)
                        ]);

                        $token = json_decode(base64_decode($request->header('token')));

                        // Start transaction to ensure data consistency
                        DB::beginTransaction();

                        $empatient = Empatient::create([
                                'full_name' => $validate['full_name'],
                                'address' => $validate['address'],
                                'date_of_birth' => $validate['date_of_birth'],
                                'mom_name' => $validate['mom_name'],
                                'chain' => $validate['chain'],
                                'gender' => $validate['gender'],
                                'case_description' => $validate['case_description'],
                                'treatment_required' => $validate['treatment_required'],
                                'chronic_diseases' => $validate['chronic_diseases'],
                                'blood_type' => $validate['blood_type'],
                        ]);

                        $belong = EMPBelongTo::create([
                                'patient_id' => $empatient->id,
                                'dep_id' => $token->id
                        ]);

                        if ($validate['treatment_required'] == 'emergency treatment') {
                                $result = PatientServices::create_patient($request);
                                if (!$result) {
                                        throw new \Exception('Failed to create patient in external system');
                                }

                                Patient_file::create([
                                        'patient_id' => $result['id'],
                                        'department_id' => 2, // Use config instead of hardcoding
                                        'resident' => 'yes',
                                        'test_result' => 'test',
                                        'X_ray_result' => 'x-ray',
                                ]);

                                EmArchive::create([
                                        'full_name' => $validate['full_name'],
                                        'address' => $validate['address'],
                                        'date_of_birth' => $validate['date_of_birth'],
                                        'mom_name' => $validate['mom_name'],
                                        'chain' => $validate['chain'],
                                        'gender' => $validate['gender'],
                                        'case_description' => $validate['case_description'],
                                        'treatment_required' => $validate['treatment_required']
                                ]);

                                // Consider if you really need to delete these
                                $empatient->delete();
                                $belong->delete();
                        }

                        DB::commit();
                        return response()->json(['message' => 'Patient info added successfully!'], 200);
                } catch (\Illuminate\Validation\ValidationException $e) {
                        DB::rollBack();
                        return response()->json(['message' => $e->getMessage(), 'errors' => $e->errors()], 422);
                } catch (\Exception $e) {
                        DB::rollBack();
                        return response()->json(['message' => $e->getMessage()], 500); // Use 500 for server errors
                }
        }

        public static function patient_file(Request $request)
        {
                $patient_info = patient::where('id', $request->patient_id)->first();
                if (!$patient_info) {
                        return response()->json(['message' => 'this patient is not exist in the system'], 401);
                }
                $tr = TransfarOperation::where('patient_id', $request->patient_id)->first();
                $belong = BelongToDep::where('patient_id', $request->patient_id)->first();
                $from = Department::where('id', $tr->from_dep_id)->first();
                $belong = Department::where('id', $belong->dep_id)->first();
                $patient_file = Patient_file::where('patient_id', $request->patient_id)->first();
                $data = ['patient_info' => $patient_info, 'dep' => $belong->name, 'last_department' => $from->name, 'other' => $patient_file];
                return response()->json(['Data' => $data], 200);
        }


        public static function transfer_empatient_dep(Request $request)
        {
                $tokenun = json_decode(base64_decode(($request->header('token'))));
                $patient = Empatient::where('id', $request->patient_id)->first();

                if (!$patient)

                        return response()->json(['message' => 'InValid ID !'], 401);

                $tr = new EMPTransfarOperation();
                $check = EMPBelongTo::where('dep_id', $tokenun->id)->where('patient_id', $patient->id)->first();
                if (!$check) {

                        return response()->json(['message' => 'this patient is not in this department so you cannot tranfer him !'], 401);
                }

                $tr->from_dep_id = $check->dep_id;
                $tr->to_dep_id = $request->tr_department;
                $tr->patient_id = $patient->id;
                $check->dep_id = $request->tr_department;
                $check->save();
                $tr->save();

                $pf = Patient_file::where('patient_id', $patient->id)->first();

                return response()->json(['message' => 'patient transfered succesfully'], 200);
        }


        public static function transfer_patient_dep(Request $request)
        {

                $tokenun = json_decode(base64_decode(($request->header('token'))));
                $patient = Patient::where('id', $request->patient_id)->first();
                $tr = new TransfarOperation();
                $check = BelongToDep::where('dep_id', $tokenun->id)->where('patient_id', $patient->id)->first();

                if (!$check) {

                        return response()->json(['message' => 'this patient is not in this department so you cannot tranfer him !'], 401);
                }

                $tr->from_dep_id = $check->dep_id;
                $tr->to_dep_id = $request->tr_department;
                $tr->patient_id = $patient->id;
                $check->dep_id = $request->tr_department;
                $check->save();
                $tr->save();

                $pf = Patient_file::where('patient_id', $patient->id)->first();

                if ($pf) {
                        $pf->department_id = $request->tr_department;
                        $pf->save();
                }

                return response()->json(['message' => 'patient transfered succesfully'], 200);
        }

        public static function Update_EMP_Info(Request $request)
        {

                $tokenun = json_decode(base64_decode(($request->header('token'))));
                $patient = Empatient::where('id', $request->patient_id)->first();
                if (!$patient)

                        return response()->json(['message' => 'InValid ID!'], 401);

                if (!EMPBelongTo::where('patient_id', $patient->id)->where('dep_id', $tokenun->id)->first())

                        return response()->json(['message' => 'InValid ID!'], 401);

                $patient->case_description = $request->case_description;
                $patient->treatment_required = $request->treatment_required;

                return response()->json(['Message' => 'Done!'], 200);
        }

        public static function Update_Info(Request $request)
        {
                $tokenun = json_decode(base64_decode(($request->header('token'))));
                $patient = Patient::where('id', $request->patient_id)->first();

                if (!$patient)
                        return response()->json(['message' => 'InValid ID!'], 401);

                if (!BelongToDep::where('patient_id', $patient->id)->where('dep_id', $tokenun->id)->first())
                        return response()->json(['message' => 'InValid ID!'], 401);

                $patient->case_description = $request->case_description;
                $patient->treatment_required = $request->treatment_required;

                return response()->json(['Message' => 'Done!'], 200);
        }


        public static function all_empatient(Request $request)
        {
                $token = json_decode(base64_decode($request->header('token')));
                $all = EMPBelongTo::where('dep_id', $token->id)->get();
                $response = [];
                foreach ($all as $item) {
                        $patient = empatient::where('id', $item->patient_id)->first();
                        $response[] = $patient;
                }
                return response()->json(['All Emergency Patient' => $response], 200);
        }


        public static function all_patient(Request $request)
        {
                $token = json_decode(base64_decode($request->header('token')));
                $all = BelongToDep::where('dep_id', $token->id)->get();
                $response = [];
                foreach ($all as $item) {
                        $patient = Patient::where('id', $item->patient_id)->first();
                        $response[] = $patient;
                }
                return response()->json(['All Emergency Patient' => $response], 200);
        }

        //search
}
