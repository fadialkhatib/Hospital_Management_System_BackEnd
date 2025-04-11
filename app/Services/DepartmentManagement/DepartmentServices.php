<?php

namespace App\Services\DepartmentManagement;

use App\Models\ActiveToken;
use App\Models\BelongToDep;
use App\Models\Department;
use App\Models\EmArchive;
use App\Models\Empatient;
use App\Models\EMPBelongTo;
use App\Models\EMPTransfarOperation;
use App\Models\FilesArchive;
use App\Models\Patient;
use App\Models\Patient_file;
use App\Models\TransfarOperation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DepartmentServices
{

        public static function update_password(Request $request)
        {

                $department = Department::where(
                        "id",
                        $request->dep_id
                )
                        ->first();
                $department->password = Hash::make($request->password);
                return response()->json(["message" => "Password for . $department->name . Updated successfuly!"], 200);
        }

        public static function delete_department(Request $request)
        {

                Department::where(
                        "id",
                        $request->dep_id
                )
                        ->delete();
                return response()->json(["message" => "Department Deleted successfully!"], 200);
        }


        public static function create_department(Request $request)
        {
                try {
                        $validate = $request->validate([
                                'name' => 'require|string',
                                'password' => 'require',
                                'type_id' => 'require'
                        ]);
                        $create = Department::create([
                                'name' => $validate['name'],
                                'password' => Hash::make($validate['password']),
                                'type_id' => $validate['type_id']
                        ]);
                } catch (\Exception $e) {
                        return response()->json($e->getMessage());
                }
                return response()->json(['message' => 'department created succsessfuly!', $create]);
        }

        public static function all_p_in_dep(Request $request)
        {
                try {
                        $token = ActiveToken::where('token', $request->header('token'))->first();
                        $patients = BelongToDep::where('dep_id', $token->department_id)->get();
                        $department_name = Department::where('id', $token->department_id)->value('name');
                        $patient_data = [];
                        foreach ($patients as $patient) {
                                $patient_id = $patient->patient_id;
                                $patient_name = Patient::where('id', $patient_id)->value('full_name');
                                $patient_data[] = ['patient_id' => $patient_id, 'patient_name' => $patient_name];
                        }
                } catch (\Exception $e) {
                        return response()->json($e->getMessage());
                }
                return response()->json(["All Patients in .$department_name.  Department " => $patient_data], 200);
        }


        public static function accept_resident(Request $request)
        {
                try {
                        $token = json_decode(base64_decode($request->header('token')));
                        $patient = Empatient::where('id', $request->patient_id)
                                ->first();
                        $check = EMPBelongTo::where('patient_id', $request->patient_id)
                                ->where('dep_id', $token->id)
                                ->first();
                        if (!$patient || !$check) {
                                return response()->json(['messgae' => 'this patient is not in this department or not exist'], 401);
                        }

                        $result = Patient::create([
                                'id' => $patient['id'],
                                'full_name' => $patient['full_name'],
                                'address' => $patient['address'],
                                'date_of_birth' => $patient['date_of_birth'],
                                'mom_name' => $patient['mom_name'],
                                'chain' => $patient['chain'],
                                'gender' => $patient['gender'],
                                'case_description' => $patient['case_description'],
                                'treatment_required' => $patient['treatment_required']
                        ]);
                        $attach = Patient_file::create([
                                'patient_id' => $result->id,
                                'department_id' => $token->id,
                                'resident' => 'yes',
                                'test_result' => 'test',
                                'X_ray_result' => 'x-ray',
                        ]);

                        $belongnew = new BelongToDep();
                        $belongnew->patient_id = $result->id;
                        $belongnew->dep_id = $token->id;
                        $belongnew->save();
                        $transfer = new TransfarOperation();
                        $transfer->patient_id = $result->id;
                        $transfer->from_dep_id = EMPTransfarOperation::where('to_dep_id', $token->id)->value('from_dep_id');
                        $transfer->to_dep_id = $token->id;
                        $transfer->save();
                        $patient->delete();
                        $check->delete();
                } catch (\Exception $e) {
                        return response()->json($e->getMessage());
                }
                return response()->json(['message' => 'patient accepted as a resident in this department  ' . $request->department_id . ' '], 200);
        }

        public static function get_residents(Request $request)
        {
                try {
                        $token = json_decode(base64_decode($request->header('token')));
                        $residents = Patient_file::where('department_id', $token->id)
                                ->get();
                        $data = [];
                        foreach ($residents as $resident) {
                                $info = $resident;
                                $patient_name = Patient::where('id', $resident->patient_id)->value('full_name');
                                $data[]  = ["resident information" => $info, " patient name : " => $patient_name];
                        }
                } catch (\Exception $e) {
                        return response()->json($e->getMessage());
                }
                return response()->json(['Data' => $data], 200);
        }


        public static function list_of_emtransfering_patient(Request $request)
        {
                try {
                        $token_dep_id = ActiveToken::where('token', $request->header('token'))->value('department_id');
                        $all = EMPBelongTo::where('dep_id', $token_dep_id)->get();
                        $data = [];
                        foreach ($all as $one) {
                                $id = $one->id;
                                $patient_id = $one->patient_id;
                                $patient_name = empatient::where('id', $patient_id)->value('full_name');
                                $from = EMPTransfarOperation::where('patient_id', $patient_id)->value('from_dep_id');
                                $namefrom = Department::where('id', $from)->value('name');
                                $to = $one->dep_id;
                                $nameto = Department::where('id', $to)->value('name');
                                $tempdata = [];
                                $tempdata = [
                                        'id ' => $id,
                                        'patient_id' => $patient_id,
                                        'patient_name' => $patient_name,
                                        'from_dep_id' => $from,
                                        'from_dep_name' => $namefrom,
                                        'to_dep_id' => $to,
                                        'to_dep_name' => $nameto,
                                ];
                                $data[] = $tempdata;
                        }
                } catch (\Exception $e) {
                        return response()->json($e->getMessage());
                }
                return response()->json(['list of emergency transfering patient' => $data]);
        }


        public static function getOut(Request $request)
        {
                try {
                        $token = json_decode(base64_decode($request->header('token')));
                        $patient = BelongToDep::where('dep_id', $token->id)->where('patient_id', $request->patient_id)->first();
                        if (!$patient) {
                                return response()->json(['message' => 'there is no patient in this name in this department'], 401);
                        }
                        $patient_file = Patient_file::where('department_id', $token->id)->where('patient_id', $request->patient_id)->first();
                        $patientpp = Patient::where('id', $request->patient_id)->first();
                        if (!$patient_file) {
                                return 'there is no patient file';
                        }
                        $patient_det = Patient::where('id', $patient->patient_id)->first();

                        $archive = FilesArchive::create([
                                'full_name' => $patient_det->full_name,
                                'address' => $patient_det->address,
                                'date_of_birth' => $patient_det->date_of_birth,
                                'mom_name' => $patient_det->mom_name,
                                'chain' => $patient_det->chain,
                                'gender' => $patient_det->gender,
                                'department_id' => $token->id,
                                'test_result' => $patient_file->test_result,
                                'X_ray_result' => $patient_file->X_ray_result,
                                'resident' => $patient_file->resident
                        ]);

                        $patient->delete();
                        $patient_det->delete();
                        $patientpp->delete();
                } catch (\Exception $e) {
                        return response()->json($e->getMessage());
                }
                return response()->json(['message' => 'patient with name ' . $archive->full_name . 'and his chain ' . $archive->chain . ' get out from the hospital successfully!']);
        }


        public static function fast_treatment(Request $request)
        {
                try {
                        $patient_det = empatient::where('id', $request->patient_id)->first();
                        $empatient = EMPBelongTo::where('patient_id', $request->patient_id)->first();
                        $archive = EmArchive::create([
                                'full_name' => $patient_det->full_name,
                                'address' => $patient_det->address,
                                'date_of_birth' => $patient_det->date_of_birth,
                                'mom_name' => $patient_det->mom_name,
                                'chain' => $patient_det->chain,
                                'gender' => $patient_det->gender,
                                'case_description' => $patient_det->case_description,
                                'treatment_required' => $patient_det->treatment_required
                        ]);

                        $patient_det->delete();
                        $empatient->delete();
                } catch (\Exception $e) {
                        return response()->json($e->getMessage());
                }
                return response()->json(['message' => 'the patient with name ' . $archive->full_name . 'and his chain ' . $archive->chain . ' fast treatment finished successfully and stored data in archive !'], 200);
        }

        //search
}
