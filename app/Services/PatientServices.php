<?php

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

class PatientServices{


        public static function create_patient(Request $request){
                try{
                        $validate = $request->validate([
                            'full_name'=>'required',
                            'address'  =>'required',
                            'date_of_birth'=>'required|date',
                            'mom_name'=>'required',
                            'chain'=>'required|integer',
                            'gender'=>'required',
                            'case_description'=>'required',
                            'treatment_required'=>'required',
                        ]);
                        $token=json_decode(base64_decode($request->header('token')));
                        $patient =Patient::create([
                                'id' => $validate['id'],
                                'full_name'=>$validate['full_name'],
                                'address'=>$validate['address'],
                                'date_of_birth'=>$validate['date_of_birth'],
                                'mom_name'=>$validate['mom_name'],
                                'chain'=>$validate['chain'],
                                'gender'=>$validate['gender'],
                                'case_description'=>$validate['case_description'],
                                'treatment_required'=>$validate['treatment_required']
                        ]);
                        $belongs = new BelongToDep();
                        $belongs->patient_id = $patient->id;
                        $belongs->dep_id = $token->id;
                        $belongs->save();
                }catch(\Exception $e){
                        return response()->json([$e->getMessage()]);
                }
                return response()->json($patient);
        }
        public static function add_patient(Request $request){
                try{
                $validate = $request->validate([
                    'full_name'=>'required',
                    'address'  =>'required',
                    'date_of_birth'=>'required|date',
                    'mom_name'=>'required',
                    'chain'=>'required|integer',
                    'gender'=>'required',
                    'case_description'=>'required',
                    'treatment_required'=>'required',
                ]);
                $token=json_decode(base64_decode($request->header('token')));
                $empatient = Empatient::create([
                    'full_name'=>$validate['full_name'],
                    'address'=>$validate['address'],
                    'date_of_birth'=>$validate['date_of_birth'],
                    'mom_name'=>$validate['mom_name'],
                    'chain'=>$validate['chain'],
                    'gender'=>$validate['gender'],
                    'case_description'=>$validate['case_description'],
                    'treatment_required'=>$validate['treatment_required']
                ]);
        
        
                $belong = new EMPBelongTo();
                $belong->patient_id = $empatient->id;
                $belong->dep_id = $token->id;
                $belong->save();
                if($validate['treatment_required'] == 'emergency treatment')
                {
                        $result = PatientServices::create_patient($request);
        
                        $attach = Patient_file::create([
                                'patient_id'=>$request->id,
                                'department_id'=>2,
                                'resident'=>'yes',
                                'test_result'=>'test',
                                'X_ray_result'=>'x-ray',
                        ]);
                        $patientArchive = EmArchive::create([
                                'full_name'=>$validate['full_name'],
                                'address'=>$validate['address'],
                                'date_of_birth'=>$validate['date_of_birth'],
                                'mom_name'=>$validate['mom_name'],
                                'chain'=>$validate['chain'],
                                'gender'=>$validate['gender'],
                                'case_description'=>$validate['case_description'],
                                'treatment_required'=>$validate['treatment_required']
                        ]);
                        $empatient->delete();
                        $belong->delete();
                }
                }catch(\Exception $e){
                    return response()->json(['message'=>$e->getMessage()],401);
        
                }
                return response()->json(['message'=>'patient info added successfully!'],200);
        
        }


        public static function patient_file(Request $request)
        {
                $patient_info = patient::where('id',$request->patient_id)->first();
                if(!$patient_info)
                {
                        return response()->json(['message'=>'this patient is not exist in the system'],401);
                }
                $tr = TransfarOperation::where('patient_id', $request->patient_id)->first();
                $belong = BelongToDep::where('patient_id', $request->patient_id)->first();
                $from = Department::where('id', $tr->from_dep_id)->first();
                $belong = Department::where('id', $belong->dep_id)->first();
                $patient_file = Patient_file::where('patient_id',$request->patient_id)->first();
                $data =['patient_info'=>$patient_info,'dep'=>$belong->name,'last_department' =>$from->name , 'other'=>$patient_file];
                return response()->json(['Data'=>$data],200);
        }


        public static function transfer_empatient_dep(Request $request){
                $tokenun = json_decode(base64_decode(($request->header('token'))));
                $patient = Empatient::where('id',$request->patient_id)->first();
        
                if(!$patient)
        
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
        
                return response()->json(['message'=>'patient transfered succesfully'],200);
        }


        public static function transfer_patient_dep(Request $request){

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
    
                return response()->json(['message'=>'patient transfered succesfully'],200);
        }

        public static function Update_EMP_Info(Request $request){

                $tokenun = json_decode(base64_decode(($request->header('token'))));
                $patient = Empatient::where('id', $request->patient_id)->first();
                if(!$patient)
        
                    return response()->json(['message' => 'InValid ID!'],401);
        
                if(!EMPBelongTo::where('patient_id',$patient->id)->where('dep_id',$tokenun->id)->first())
        
                    return response()->json(['message' => 'InValid ID!'],401);
        
                $patient -> case_description = $request -> case_description;
                $patient -> treatment_required = $request -> treatment_required;
        
               return response()->json(['Message'=>'Done!'],200);
        
        }

        public static function Update_Info(Request $request){
                $tokenun = json_decode(base64_decode(($request->header('token'))));
                $patient = Patient::where('id', $request->patient_id)->first();
        
                if(!$patient)
                    return response()->json(['message' => 'InValid ID!'],401);
        
                if(!BelongToDep::where('patient_id',$patient->id)->where('dep_id',$tokenun->id)->first())
                    return response()->json(['message' => 'InValid ID!'],401);
        
                $patient -> case_description = $request -> case_description;
                $patient -> treatment_required = $request -> treatment_required;
        
                return response()->json(['Message'=>'Done!'],200);
        
        }


        public static function all_empatient(Request $request)
        {
                $token = json_decode(base64_decode($request->header('token')));
                $all = EMPBelongTo::where('dep_id',$token->id)->get();
                $response = [];
                foreach($all as $item){
                        $patient = empatient::where('id' , $item->patient_id)->first();
                        $response[] = $patient;
                }
                return response()->json(['All Emergency Patient'=>$response],200);
        }
        
}
