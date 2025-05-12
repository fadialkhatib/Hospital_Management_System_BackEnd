<?php

namespace App\Http\Controllers\DepartmentManagementSystem;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Services\DepartmentManagement\DepartmentServices;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function update_password(Request $request)
    {

        $update = DepartmentServices::update_password($request);
        return response()->json(['message' => $update]);
    }

    public function delete_department(Request $request)
    {

        $delete = DepartmentServices::delete_department($request);
        return response()->json(['message' => $delete]);
    }

    public function create_department(Request $request)
    {
        $create = DepartmentServices::create_department($request);
        return response()->json(['message' => $create]);
    }

    public function all_deps()
    {
        $all = Department::get('name');
        return response()->json(['All Departments' => $all], 200);
    }


    public function show_dep(Request $request)
    {
        $dep = Department::where('id', $request->id)->first();
        return response()->json(['dep_details' => $dep], 200);
    }


    public function all_p_in_dep(Request $request)
    {
        $get = DepartmentServices::all_p_in_dep($request);
        return response()->json(['message' => $get]);
    }



    public function accept_resident(Request $request)
    {
        $accept = DepartmentServices::accept_resident($request);
        return response()->json(['message' => $accept]);
    }

    public function get_residents(Request $request)
    {
        $get = DepartmentServices::get_residents($request);
        return response()->json(['message' => $get]);
    }


    public function list_of_emtransfering_patient(Request $request)
    {
        $list = DepartmentServices::list_of_emtransfering_patient($request);
        return response()->json(['message' => $list]);
    }


    // public function list_of_transfering_patient(Request $request)
    // {
    //     $token=ActiveToken::where('token',$request->header('token'))->first();
    //     $all = TransfarOperation::where('to_dep_id',$token->department_id)->get();
    //     if(!$all)
    //     {
    //         return response()->json(['message'=>'there is no transfering patient now !'],400);
    //     }
    //     $data=[];
    //     foreach ($all as $one)
    //     {
    //         $id = $one->id;
    //         $patient_id = $one->patient_id;
    //         $patient_name = empatient::where('id',$patient_id)->value('full_name');
    //         $from = $one->from_dep_id;
    //         $namefrom=Department::where('id',$from)->value('name');
    //         $to = $one->to_dep_id;
    //         $nameto = Department::where('id',$to)->value('name');
    //         $data[]=[' id'=>$id ,' patient_id'=>$patient_id ,'patient_name'=>$patient_name,
    //         'from_dep_id'=>$from,'from_dep_name'=>$namefrom ,'to_dep_id'=>$to, 'to_dep_name'=>$nameto];
    //     }        return response()->json($data);

    // }

    public function get_out_patient(Request $request)
    {
        $res = DepartmentServices::getOut($request);
        return response()->json(['message' => $res]);
    }

    public function fast_treatment(Request $request)
    {
        $fast = DepartmentServices::fast_treatment($request);
        return response()->json(['message' => $fast]);
    }

    public function new_request(Request $request)
    {
        $new = DepartmentServices::new_request($request);
        return response()->json(['message' => $new]);
    }
}
