<?php

namespace App\Http\Controllers;

use App\Models\empatient;
use App\Models\emTestQueue;
use App\Models\emXrayQueue;
use App\Models\Patient;
use App\Models\Testqueue;
use App\Models\Xrayqueue;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    ########   Test Queue   ########

    public function request_emtest(Request $request)
    {
        try{
        $patient = Empatient::where('id',$request->patient_id)->first();
        if(!$patient)
        {
            return response()->json(['message'=>'this patient is not exist!'],401);
        }
        $add_to_queue = EmTestQueue::create([
            'patient_id'=>$patient->id
        ]);
    }catch(\Exception $e)
    {
        return response()->json($e->getMessage());
    }
        return response()->json(['message'=>'the patient will be in the queue please go to the tast department !'],200);
    }


    public function request_test(Request $request)
    {
        try{
        $patient = Patient::where('id',$request->patient_id)->first();
        if(!$patient)
        {
            return response()->json(['message'=>'this patient is not exist!'],401);
        }
        $add_to_queue = Testqueue::create([
            'patient_id'=>$patient->id
        ]);
    }catch(\Exception $e)
    {
        return response()->json($e->getMessage());
    }
        return response()->json(['message'=>'the patient will be in the queue please go to the tast department !'],200);
    }


    public function all_queue_patients()
    {
        $all = TestQueue::with('patient')->get();
        if($all->isEmpty()){
            return response()->json(['message' => 'No patients found'], 404);
        }
        return response()->json(['All Patient in Test Queue'=>$all],200);
        

    }

    public function all_emqueue_patients()
    {
        $all = EmTestQueue::with('patient')->get();
        if($all->isEmpty()){
            return response()->json(['message' => 'No patients found'], 404);
        }
        return response()->json(['All Patient in Emergency Test Queue'=>$all],200);
    }


    public function get_p_from_queue(Request $request)
    {
        try{
        $patient = TestQueue::where('patient_id',$request->patient_id)->first();
        if(!$patient)
        {
            return response()->json(['messgae'=>'this patient is out of the queue'],401);
        }
        $patient_name = patient::where('id',$patient->patient_id)->value('full_name');
//        sleep(10);
        $patient->delete();
    }catch(\Exception $e)
    {
        return response()->json($e->getMessage());
    }
        return response()->json(['message'=>'this patient with name '.$patient_name.' is turn'],200);
    }


    public function get_emp_from_queue(Request $request)
    {
        try{
        $patient = EmTestQueue::where('patient_id',$request->patient_id)->first();
        if(!$patient)
        {
            return response()->json(['messgae'=>'this patient is out of the queue'],401);
        }
        $patient_name = Empatient::where('id',$patient->patient_id)->value('full_name');
//        sleep(10);
        $patient->delete();
    }catch(\Exception $e)
    {
        return response()->json($e->getMessage());
    }
        return response()->json(['message'=>'this patient with name '.$patient_name.' is turn'],200);
    }




    ############# X-RAY QUEUE   #################
    public function request_emxray(Request $request)
    {
        try{
        $patient = Empatient::where('id',$request->patient_id)->first();
        if(!$patient)
        {
            return response()->json(['message'=>'this patient is not exist!'],401);
        }
        $add_to_queue = EmXrayQueue::create([
            'patient_id'=>$patient->id
        ]);
    }catch(\Exception $e)
    {
        return response()->json($e->getMessage());
    }
        return response()->json(['message'=>'the patient will be in the queue please go to the tast department !'],200);
    }



    public function request_xray(Request $request)
    {
        try{
        $patient = patient::where('id',$request->patient_id)->first();
        if(!$patient)
        {
            return response()->json(['message'=>'this patient is not exist!'],401);
        }
        $add_to_queue = Xrayqueue::create([
            'patient_id'=>$patient->id
        ]);
    }catch(\Exception $e)
    {
        return response()->json($e->getMessage());
    }
        return response()->json(['message'=>'the patient will be in the queue please go to the tast department !'],200);
    }


    public function all_xqueue_patients()
    {
        $all = XrayQueue::with('patient')->get();
        if($all->isEmpty()){
            return response()->json(['message' => 'No patients found'], 404);
        }
        return response()->json(['All Patient in XRay Queue'=>$all],200);
    }

    public function all_emxqueue_patients()
    {
        $all = emXrayQueue::with('patient')->get();
        if($all->isEmpty()){
            return response()->json(['message' => 'No patients found'], 404);
        }
        return response()->json(['All Patient in Emergency XRay Queue'=>$all],200);
    }


    public function get_p_from_xqueue(Request $request)
    {
        try{
        $patient = XrayQueue::where('patient_id',$request->patient_id)->first();
        if(!$patient)
        {
            return response()->json(['messgae'=>'this patient is out of the queue'],401);
        }
        $patient_name = patient::where('id',$patient->patient_id)->value('full_name');
//        sleep(10);
        $patient->delete();
    }catch(\Exception $e)
    {
        return response()->json($e->getMessage());
    }
        return response()->json(['message'=>'this patient with name '.$patient_name.'  is turn!'],200);
    }


    public function get_emp_from_xqueue(Request $request)
    {
        try{
        $patient = EmXrayQueue::where('patient_id',$request->patient_id)->first();
        if(!$patient)
        {
            return response()->json(['messgae'=>'this patient is out of the queue'],401);
        }
        $patient_name = Empatient::where('id',$patient->patient_id)->value('full_name');
//        sleep(10);
        $patient->delete();
    }catch(\Exception $e)
    {
        return response()->json($e->getMessage());
    }
        return response()->json(['message'=>'this patient with name '.$patient_name.'  is turn!'],200);
    }
}
