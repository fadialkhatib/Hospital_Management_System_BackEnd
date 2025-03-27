<?php

namespace App\Http\Controllers;

use App\Models\AbcenseScheduale;
use App\Models\Date;
use App\Models\Employee;
use App\Models\WorkScheduale;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HRController extends Controller
{
    //Establish attendance insert data into DB
    public function Establish_attendance(Request $request)
    {
        $date = $request->date;
        $date_store = Date::create([
            'date'=>$date
        ]);
        $create = WorkScheduale::create([
            'employee_id'=>$request->emp_id,
            'date_id'=>$date_store->id,
        ]);
        $employee_name = Employee::where('id',$request->emp_id)->value('name');
        return response()->json(['the emolyee id is'=>$create->employee_id ,'his name is '=>$employee_name, 'in date'=>$date_store->date]);
    }

    //Mark the doctor as absent Lifting leave or penalty

    public function absent_lifting_leave(Request $request)
    {
        $date = $request->date;
        $date_store = Date::create([
            'date'=>$date
        ]);
        $create = AbcenseScheduale::create([
            'employee_id'=>$request->emp_id,
            'date_id'=>$date_store->id,
            'vacation'=>1,
        ]);
        $employee_name = Employee::where('id',$request->emp_id)->value('name');
        return response()->json(['the emolyee id is'=>$create->employee_id ,'his name is '=>$employee_name, 'in vacation in date'=>$date_store->date]);
    }


    public function absent_panalty(Request $request)
    {
        $date = $request->date;
        $date_store = Date::create([
            'date'=>$date
        ]);
        $create = AbcenseScheduale::create([
            'employee_id'=>$request->emp_id,
            'date_id'=>$date_store->id,
            'vacation'=>0,
        ]);
        $employee_name = Employee::where('id',$request->emp_id)->value('name');
        return response()->json(['the emolyee id is'=>$create->employee_id ,'his name is '=>$employee_name, 'lifting panalty without vacation in date'=>$date_store->date]);
    }


    //Scheeddual Editing Update the DB data

    public function update_attendance(Request $request)
    {
        $date = $request->date;
        $date_store = Date::create(['date'=>$date]);
        $update = WorkScheduale::where('id',$request->attendance_id)->update([
            'date_id'=>$date_store->id,
        ]);
        return response()->json(['message'=>'work schedule updated successfully']);
    }

    public function update_abcent(Request $request)
    {
        $date = $request->date;
        $date_store = Date::create(['date'=>$date]);
        $update = AbcenseScheduale::where('id',$request->attendance_id)->update([
            'date_id'=>$date_store->id,
            'vacation'=>$request->vacation
        ]);
        return response()->json(['message'=>'abcent schedule updated successfully']);
    }


    public function all_att_in_date(Request $request)
    {
        $date = Date::where('date',$request->date)->value('id');
        $Work = WorkScheduale::where('date_id',$date)->get();
        return response()->json(['All Att in Date '=>$Work],200);
    }

    public function all_abcent_in_date(Request $request)
    {
        $date = Date::where('date',$request->date)->value('id');
        $abcent = AbcenseScheduale::where('date_id',$date)->where('vacation',1)->get();
        return response()->json(['All Abcent in Date '=>$abcent],200);
    }

    public function all_penalty_in_date(Request $request)
    {
        $date = Date::where('date',$request->date)->value('id');
        $penaly =  AbcenseScheduale::where('date_id',$date)->where('vacation',0)->get();
        return response()->json(['All Penalty in Date '=>$penaly],200);

    }



    public function all_employee()
    {
        $employees = Employee::all();
        return response()->json(['All Employees '=>$employees],200);

    }

    public function add_emp(Request $request)
    {
        $validate = $request->validate([
            'name'=>'required|string',
            'department_id'=>'required|int',
        ]);
        $add = Employee::create([
            'name'=>$validate['name'],
            'department_id'=>$validate['department_id']
        ])  ; 
        return response()->json(['message'=>'employee added successfuly']);
    }

    public function show_emp(Request $request)
    {
        $employee = Employee::where('id',$request->emp_id)->first();
        return response()->json(['The Employee'=>$employee],200);
    }

    public function update_emp(Request $request)
    {
        $validate = $request->validate([
            'name'=>'required|string',
            'department_id'=>'required|int',
        ]);
        $update = Employee::where('id',$request->emp_id)->update([
            'name'=>$validate['name'],
            'department_id'=>$validate['department_id']
        ])  ; 
        return response()->json(['message'=>'employee updated successfuly']);
    }

    public function delete_emp(Request $request)
    {
        $delete = Employee::find($request->emp_id);
        $delete->delete();
        return response()->json(['message'=>'deleted successfully']);
    }



    //Work Schedule management
    //Leaves management
    //penalties management TBD
    //attendance
    //employee
}
