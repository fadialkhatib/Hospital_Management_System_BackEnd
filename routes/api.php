<?php

use App\Http\Controllers\PatientRecord\PatientController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PatientRecord\DeathController;
use App\Http\Controllers\PatientRecord\BirthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DepartmentManagementSystem\DepartmentController;
use App\Http\Controllers\DepartmentManagementSystem\LoginController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\HRController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\PatientRecord\SurgeryController;
use App\Http\Controllers\SupplierManagementSystem\ContractController;
use App\Http\Controllers\SupplierManagementSystem\SupplierController;
use App\Http\Controllers\TenderManagementSystem\BidController;
use App\Http\Controllers\TenderManagementSystem\TenderController;
use App\Http\Controllers\WareHouseManagementSystem\LogController;
use App\Http\Controllers\WareHouseManagementSystem\WareHouseController;
use App\Http\Middleware\CheckStock;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;


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

Route::post('/start', [SessionController::class, 'startSession']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/dep/all', [DepartmentController::class, 'all_deps']);
Route::post('/d/d', [WareHouseController::class, 'create_item']);


########### AUTH MIDDLEWARE ##################
Route::group(['middleware' => 'myauth'], function () {


    ### IT ADMIN PREFIX ###
    Route::group(['middleware' => 'ITAdmin'], function () {

        Route::group(['prefix' => 'dep', 'controller' => DepartmentController::class], function () {
            Route::post('/create', 'create_department');
            Route::post('/delete', 'delete_department');
            Route::post('/updatepass', 'update_password');
        });
        // Death API Routes
        Route::group(['prefix' => 'deaths', 'controller' => DeathController::class], function () {
            Route::get('/all',  'index');
            Route::get('/date',  'getByDate');
            Route::post('/store',  'store');
            Route::post('/update/{id}',  'update');
            Route::delete('/delete/{id}',  'destroy');
        });

        Route::group(['prefix' => 'births', 'controller' => BirthController::class], function () {
            Route::get('/all',  'index');
            Route::post('/date',  'getByDate');
            Route::post('/store',  'store');
            Route::post('/update/{id}',  'update');
            Route::delete('/delete/{id}',  'destroy');
        });
    });


    ####### Ambulance Employee PREFIX #######
    Route::group(['middleware' => 'emg'], function () {
        Route::post('/deps/patients', [DepartmentController::class, 'all_p_in_dep']); //1
        Route::group(['prefix' => 'patient', 'controller' => PatientController::class], function () {
            Route::post('/add', 'add_patient');
            Route::post('/emtransfer', 'transfer_empatient_dep');
        });

        Route::group(['prefix' => 'emrequest', 'controller' => QueueController::class], function () {
            Route::post('/test', 'request_emtest');
            Route::post('/xray', 'request_emxray');
        });
    });


    ####### WareHouse Api Routes #######
    Route::group(['middleware' => 'warehouse'], function () {
        //WareHouse API Routes
        Route::group(['prefix' => 'warehouse'], function () {
            Route::get('/all', [WareHouseController::class, 'index']);
            Route::get('/all/cat', [WareHouseController::class, 'all_categories']);
            Route::get('/all/sub', [WareHouseController::class, 'all_subcategories']);
            Route::get('/all/item', [WareHouseController::class, 'all_item_in_cat']);
            Route::post('/add/cat', [WareHouseController::class, 'create_category']);
            Route::post('/add/sub', [WareHouseController::class, 'create_subcategory']);
            Route::post('/add/item', [WareHouseController::class, 'create_item']);
            Route::post('/ub/cat', [WareHouseController::class, 'update_category']);
            Route::post('/ub/sub', [WareHouseController::class, 'update_subcategory']);
            Route::post('/ub/item', [WareHouseController::class, 'update_item']);
            Route::post('/show/cat', [WareHouseController::class, 'getCategory']);
            Route::post('/show/sub', [WareHouseController::class, 'getSub']);
            Route::post('/show/item', [WareHouseController::class, 'getItem']);
            Route::delete('/del/cat', [WareHouseController::class, 'delete_category']);
            Route::delete('/del/sub', [WareHouseController::class, 'delete_subcategory']);
            Route::delete('/del/item', [WareHouseController::class, 'delete_item']);
            Route::post('/search', [WareHouseController::class, 'Search']);
            Route::post('/approve', [WareHouseController::class, 'approve'])->middleware(CheckStock::class);
        });


        //Tender API Routes
        Route::group(['prefix' => 'tender'], function () {
            Route::get('/all', [TenderController::class, 'index']);
            Route::post('/by/cat', [TenderController::class, 'getByCategory']);
            Route::post('/by/status', [TenderController::class, 'getByStatus']);
            Route::post('/add', [TenderController::class, 'NewTender']);
            Route::post('/details', [TenderController::class, 'tenderItemDetails']);
            Route::post('/ub', [TenderController::class, 'UpdateTender']);
            Route::post('/show', [TenderController::class, 'getTender']);
            Route::delete('/del', [TenderController::class, 'DeleteTender']);
            Route::post('/ch/status', [TenderController::class, 'changeStatus']);
        });


        //Contract API Routes
        Route::group(['prefix' => 'contract'], function () {
            Route::get('/all', [ContractController::class, 'index']);
            Route::get('/by/ten', [ContractController::class, 'getByTender']);
            Route::get('/by/bid', [ContractController::class, 'getByBid']);
            Route::get('/by/supp', [ContractController::class, 'getBysupplier']);
            Route::post('/add', [ContractController::class, 'createContract']);
            Route::post('/ub', [ContractController::class, 'updateContract']);
            Route::get('/show', [ContractController::class, 'getContract']);
            Route::delete('/del', [ContractController::class, 'deleteContract']);
            Route::post('/ch/status', [ContractController::class, 'changeStatus']);
        });


        //InventoryLog API Routes
        Route::group(['prefix' => 'log'], function () {
            Route::get('/all', [LogController::class, 'Logs']);
            Route::get('/by/action', [LogController::class, 'logsByAction']);
        });
    });





    Route::post('/logout', [LoginController::class, 'logout']);

    Route::post('/dep/show', [DepartmentController::class, 'show_dep']);
    Route::post('/dep/patients', [DepartmentController::class, 'all_p_in_dep']); //1
    Route::post('/dep/accept_resident', [DepartmentController::class, 'accept_resident']);
    Route::post('/dep/get_residents', [DepartmentController::class, 'get_residents']);
    Route::post('/dep/emptrlist', [DepartmentController::class, 'list_of_emtransfering_patient']);
    Route::post('/dep/ptrlist', [DepartmentController::class, 'list_of_transfering_patient']);
    Route::post('/dep/getout', [DepartmentController::class, 'get_out_patient']);
    Route::post('/dep/fast', [DepartmentController::class, 'fast_treatment']);


    Route::get('/patient/allempatient', [PatientController::class, 'all_empatient']);
    Route::post('/patient/emtransfer', [PatientController::class, 'transfer_empatient_dep']); //go back
    Route::post('/patient/transfer', [PatientController::class, 'transfer_patient_dep']);
    Route::post('/patient/file', [PatientController::class, 'patient_file']);
    Route::post('/patient/search', [PatientController::class, 'searchbypatient']);

    Route::post('/request/test', [QueueController::class, 'request_test']);
    Route::post('/request/xray', [QueueController::class, 'request_xray']);

    Route::post('/surgery/emadd', [SurgeryController::class, 'Add_emsurgery']);
    Route::post('/surgery/add', [SurgeryController::class, 'Add_surgery']);









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











    //Bid API Routes
    Route::group(['prefix' => 'bid'], function () {
        Route::get('/all', [BidController::class, 'index']);
        Route::get('/by/supp', [BidController::class, 'getBySupplier']);
        Route::get('/by/status', [BidController::class, 'getByStatus']);
        Route::get('/by/tn', [BidController::class, 'getByTender']);
        Route::post('/add', [BidController::class, 'craete_bid']);
        Route::post('/ub', [BidController::class, 'update_bid']);
        Route::get('/show', [BidController::class, 'getBid']);
        Route::delete('/del', [BidController::class, 'delete_Bid']);
        Route::post('/ch/status', [BidController::class, 'changeStatus']);
    });


    //Supplier API Routes
    Route::group(['prefix' => 'supplier'], function () {
        Route::get('/all', [SupplierController::class, 'index']);
        Route::get('/active', [SupplierController::class, 'getActiveSuppliers']);
        Route::get('/non/active', [SupplierController::class, 'getNonActiveSuppliers']);
        Route::post('/add', [SupplierController::class, 'addSupplier']);
        Route::post('/ub', [SupplierController::class, 'updateSupplierinfo']);
        Route::post('/approve', [SupplierController::class, 'approve']);
        Route::post('/show', [SupplierController::class, 'getSupplier']);
        Route::post('/item', [SupplierController::class, 'getSupplierItem']);
    });






    // ####### DEB REC PREFIX #########
    // Route::group(['middleware' => 'DepRec'], function () {

    //     Route::group(['prefix' => 'dep', 'controller' => DepartmentController::class], function () {});

    //     Route::group(['prefix' => 'patient', 'controller' => PatientController::class], function () {});

    //     Route::group(['prefix' => 'request', 'controller' => QueueController::class], function () {});
    // });


    ####### Em_Radiographer PREFIX ##########


    Route::post('/emxray/attach/x-ray', [PatientController::class, 'em_X_ray_result']);         //must change

    Route::group(['prefix' => 'emxray', 'controller' => QueueController::class], function () {
        Route::get('/all', 'all_emxqueue_patients');
        Route::post('/xpatient', 'get_emp_from_xqueue');
    });


    ####### Radiographer PREFIX ##########
    Route::post('/patient/attach/x-ray', [PatientController::class, 'X_ray_result']);         //must change

    Route::group(['prefix' => 'xray', 'controller' => QueueController::class], function () {
        Route::get('/all', 'all_xqueue_patients');
        Route::post('/xpatient', 'get_p_from_xqueue');
    });

    ### em Test Lab PREFIX ###
    Route::post('/emtest/attach/test', [PatientController::class, 'em_test_result']);   //must change

    Route::group(['prefix' => 'emtest', 'controller' => QueueController::class], function () {
        Route::get('/all', 'all_emqueue_patients');
        Route::post('/emspatient', 'get_emp_from_queue');
    });



    ### Test Lab PREFIX ###

    Route::post('/patient/attach/test', [PatientController::class, 'test_result']);       //must change
    Route::group(['prefix' => 'test', 'controller' => QueueController::class], function () {
        Route::get('/all', 'all_queue_patients');
        Route::post('/spatient', 'get_p_from_queue');
    });






    Route::group(['prefix' => 'surgery', 'controller' => SurgeryController::class], function () {
        Route::get('/all', 'surgey_queue');
        Route::post('/queue', 'get_p_from_surgeryqueue');
    });

    Route::group(['prefix' => 'surgery', 'controller' => SurgeryController::class], function () {
        Route::get('/emall', 'em_surgey_queue');
        Route::post('/emqueue', 'get_emp_from_surgeryqueue');
    });


    Route::post('/dep/add', [DepartmentController::class, 'new_request']);
});
