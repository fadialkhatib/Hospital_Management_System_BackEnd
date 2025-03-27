<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DeathController;
use App\Http\Controllers\BirthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\HRController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\SurgeryController;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Models\Login as ModelsLogin;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//

Route::post('/hash', function(Request $request)
    {
        return  Department::where(['id'=>$request->department_id,
                                   'password'=>$request->password])
                                   ->update([
                'password'=>Hash::make($request->password)
                                   ]);
        }
    );

Route::get('/aaa',function (){
    return response()->json(["password" => Hash::make("12345678")]);
});
Route::post('/start',[SessionController::class,'startSession']);
Route::post('/login',[LoginController::class,'login']);
Route::get('/dep/all',[DepartmentController::class,'all_deps']);


########### AUTH MIDDLEWARE ##################
Route::group(['middleware'=>'myauth'],function(){

    //['middleware'=>'handshake']

    Route::post('/logout',[LoginController::class,'logout']);

    Route::post('/dep/show',[DepartmentController::class,'show_dep']);
    Route::post('/dep/patients',[DepartmentController::class,'all_p_in_dep']);//1
    Route::post('/dep/accept_resident',[DepartmentController::class,'accept_resident']);
    Route::post('/dep/get_residents',[DepartmentController::class,'get_residents']);
    Route::post('/dep/emptrlist',[DepartmentController::class,'list_of_emtransfering_patient']);
    Route::post('/dep/ptrlist',[DepartmentController::class,'list_of_transfering_patient']);
    Route::post('/dep/getout',[DepartmentController::class,'get_out_patient']);
    Route::post('/dep/fast',[DepartmentController::class,'fast_treatment']);


    Route::get('/patient/allempatient',[PatientController::class,'all_empatient']);
    Route::post('/patient/emtransfer',[PatientController::class,'transfer_empatient_dep']);//go back
    Route::post('/patient/transfer',[PatientController::class,'transfer_patient_dep']);
    Route::post('/patient/file',[PatientController::class,'patient_file']);
    Route::post('/patient/search',[PatientController::class,'searchbypatient']);

    Route::post('/request/test',[QueueController::class,'request_test']);
    Route::post('/request/xray',[QueueController::class,'request_xray']);

    Route::post('/surgery/emadd',[SurgeryController::class,'Add_emsurgery']);
    Route::post('/surgery/add'  ,[SurgeryController::class,'Add_surgery']);

                ### IT ADMIN PREFIX ###
    Route::group(['middleware' => 'ITAdmin'],function(){

        Route::group(['prefix'=>'dep','controller'=>DepartmentController::class],function(){
            Route::post('/create','create_department');
            Route::post('/delete','delete_department');
            Route::post('/updatepass','update_password');
        });
            // Death API Routes
        Route::group(['prefix'=>'deaths','controller'=>DeathController::class],function(){
            Route::get('/all',  'index');
            Route::get('/date',  'getByDate');
            Route::post('/store',  'store');
            Route::post('/update/{id}',  'update');
            Route::delete('/delete/{id}',  'destroy');
        });

        Route::group(['prefix'=>'births','controller'=>BirthController::class],function(){
            Route::get('/all',  'index');
            Route::post('/date',  'getByDate');
            Route::post('/store',  'store');
            Route::post('/update/{id}',  'update');
            Route::delete('/delete/{id}',  'destroy');
        });


    });

            ####### Ambulance Employee PREFIX #######
    Route::group(['middleware' => 'AmbulanceEmp'],function(){


        Route::post('/deps/patients',[DepartmentController::class,'all_p_in_dep']);//1

        Route::group(['prefix'=>'patient','controller'=>PatientController::class],function(){
            Route::post('/add','add_patient');
            Route::post('/emtransfer','transfer_empatient_dep');
        });

        Route::group(['prefix'=>'emrequest','controller'=>QueueController::class],function(){
            Route::post('/test','request_emtest');
            Route::post('/xray','request_emxray');
        });

    });

            ####### DEB REC PREFIX #########
    Route::group(['middleware' => 'DepRec'],function(){

        Route::group(['prefix'=>'dep','controller'=>DepartmentController::class],function(){
        });

        Route::group(['prefix'=>'patient','controller'=>PatientController::class],function(){
        });

        Route::group(['prefix'=>'request','controller'=>QueueController::class],function(){

        });
    });


            ####### Em_Radiographer PREFIX ##########
    Route::group(['middleware' => 'emRadioGrapher'],function(){

            Route::post('/emxray/attach/x-ray',[PatientController::class,'em_X_ray_result']);         //must change

        Route::group(['prefix'=>'emxray','controller'=>QueueController::class],function(){
            Route::get('/all','all_emxqueue_patients');
            Route::post('/xpatient','get_emp_from_xqueue');
            });
        });


            ####### Radiographer PREFIX ##########
    Route::group(['middleware' => 'RadioGrapher'],function(){

            Route::post('/patient/attach/x-ray',[PatientController::class,'X_ray_result']);         //must change

        Route::group(['prefix'=>'xray','controller'=>QueueController::class],function(){
            Route::get('/all','all_xqueue_patients');
            Route::post('/xpatient','get_p_from_xqueue');
        });
    });

                ### em Test Lab PREFIX ###
    Route::group(['middleware' => 'emTestLab'],function(){

            Route::post('/emtest/attach/test',[PatientController::class,'em_test_result']);   //must change

        Route::group(['prefix'=>'emtest','controller'=>QueueController::class],function(){
            Route::get('/all','all_emqueue_patients');
            Route::post('/emspatient','get_emp_from_queue');
        });
    });

                ### Test Lab PREFIX ###
    Route::group(['middleware' => 'TestLab'],function(){

            Route::post('/patient/attach/test',[PatientController::class,'test_result']);       //must change
        Route::group(['prefix'=>'test','controller'=>QueueController::class],function(){
            Route::get('/all','all_queue_patients');
            Route::post('/spatient','get_p_from_queue');
        });
    });

                ### Admissions Monitor PREFIX ###
    Route::group(['middleware' => 'AdmissionMonitor'],function(){

        Route::group(['prefix'=>'dep','controller'=>DepartmentController::class],function(){
        });

        Route::group(['prefix'=>'patient','controller'=>PatientController::class],function(){
        });

    });

                ### med Storekeeper PREFIX ###
    Route::group(['middleware' => 'medStoreKeeper'],function(){

        Route::group(['prefix'=>'resources','controller'=>ResourceController::class],function(){
            Route::get('/all', 'index');
            Route::post('/store', 'store');
            Route::get('/show/{id}', 'show');
            Route::post('/update', 'update');
            Route::post('/delete', 'destroy');
        });
    });

                ### eq Storekeeper PREFIX ###
    Route::group(['middleware' => 'eqStoreKeeper'],function(){

        // routes/api.php
        Route::group(['prefix'=>'equipment','controller'=>EquipmentController::class],function(){
            Route::get('/all', 'index');
            Route::post('/store', 'store');
            Route::get('/show/{id}', 'show');
            Route::post('/update', 'update');
            Route::get('/delete/{id}', 'destroy');
        });
    });

                ### HR PREFIX ###
    Route::group(['middleware' => 'HR'],function(){
        Route::group(['prefix'=>'HR','controller'=>HRController::class],function(){
            Route::post('/establish', 'Establish_attendance');
            Route::post('/leave', 'absent_lifting_leave');
            Route::post('/panalty', 'absent_panalty');
            Route::post('/atupdate', 'update_attendance');
            Route::post('/abupdate', 'update_abcent');
            Route::post('/allat', 'all_att_in_date');
            Route::post('/allabc', 'all_abcent_in_date');
            Route::post('/allpen', 'all_penalty_in_date');
            Route::get ('/allemp','all_employee');
            Route::post('/addemp', 'add_emp');
            Route::post('/showemp', 'show_emp');
            Route::post('/updateemp', 'update_emp');
            Route::post('/deleteemp', 'delete_emp');

        });
    });


    Route::group(['middleware'=>'SurgeryDepartment'],function(){
        Route::group(['prefix'=>'surgery','controller'=>SurgeryController::class],function(){
            Route::get('/all'    ,'surgey_queue');
            Route::post('/queue'    ,'get_p_from_surgeryqueue');
        });
    });
    Route::group(['middleware'=>'EmergencySurgeryDepartment'],function(){
        Route::group(['prefix'=>'surgery','controller'=>SurgeryController::class],function(){
            Route::get('/emall'  ,'em_surgey_queue');
            Route::post('/emqueue'  ,'get_emp_from_surgeryqueue');
        });
    });




});


// Death API Routes
Route::get('/deaths/all', [DeathController::class, 'index']);
Route::post('/deaths/date', [DeathController::class, 'getByDate']);
Route::post('/deaths/store', [DeathController::class, 'store']);
Route::post('/deaths/update/{id}', [DeathController::class, 'update']);
Route::delete('/deaths/delete/{id}', [DeathController::class, 'destroy']);


// Births API Routes
Route::get('/births/all', [BirthController::class, 'index']);
Route::get('/births/date', [BirthController::class, 'getByDate']);
Route::post('/births/store', [BirthController::class, 'store']);
Route::post('/births/update/{id}', [BirthController::class, 'update']);
Route::delete('/births/delete/{id}', [BirthController::class, 'destroy']);
