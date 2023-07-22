<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SystemInformationController;
use App\Http\Controllers\Admin\WalkByPatientController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\PatientAdmitController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\RewardController;
use App\Http\Controllers\Admin\TherapistController;
use App\Http\Controllers\Admin\DietChartController;
use App\Http\Controllers\Admin\MedicineController;
use App\Http\Controllers\Admin\HealthSupplementController;
use App\Http\Controllers\Admin\TherapyListController;
use App\Http\Controllers\Admin\TherapyIngredientController;
use App\Http\Controllers\Admin\DoctorWaitingListController;
use App\Http\Controllers\Admin\PatientPrecriptionController;
use App\Http\Controllers\Admin\RevisedBillingController;
use App\Http\Controllers\Admin\BillingController;
use App\Http\Controllers\Admin\TherapyAppointmentController;
use App\Http\Controllers\Admin\WalkByPatientTherapyController;
use App\Http\Controllers\Admin\DoctorAppointmentController;
use App\Http\Controllers\Admin\MedicineEquipmentController;
use App\Http\Controllers\Admin\PowderController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\TreatMentChartController;
use App\Http\Controllers\Admin\TherapyPackageController;
use App\Http\Controllers\Admin\AgrementFormOneController;
use App\Http\Controllers\Admin\AgrementFormTwoController;
use App\Http\Controllers\Admin\AgrementFormThreeController;
use App\Http\Controllers\Admin\InventoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('admin.auth.login');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'mainLogin'])->name('mainLogin');

Route::get('/clear', function() {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    return 'Cleared!';
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'admin'], function () {


    Route::get('/', [DashBoardController::class, 'index'])->name('admin.dashboard');

    //therapy_package



    Route::resource('inventoryList', InventoryController::class);

    Route::resource('agreementFormThree', AgrementFormThreeController::class);
    Route::resource('agreementFormTwo', AgrementFormTwoController::class);
    Route::resource('agreementFormOne', AgrementFormOneController::class);

    Route::controller(AgrementFormOneController::class)->group(function () {

        Route::get('/searchPatientFromVamanKarma', 'searchPatientFromVamanKarma')->name('searchPatientFromVamanKarma');

    });


    Route::resource('therapyPackages', TherapyPackageController::class);

  //therapy_apoinment_controller
  Route::resource('therapyAppointments', TherapyAppointmentController::class);

  Route::controller(TherapyAppointmentController::class)->group(function () {
      Route::get('/getTherapyAppointmentDetail', 'getTherapyAppointmentDetail')->name('getTherapyAppointmentDetail');
      Route::get('/getTherapyListDetail', 'getTherapyListDetail')->name('getTherapyListDetail');

  });

  //therapy_apoinment_controller


  Route::resource('treatMentChart', TreatMentChartController::class);

  Route::controller(TreatMentChartController::class)->group(function () {

    Route::get('/getTherapyInformation', 'getTherapyInformation')->name('getTherapyInformation');


});




    //walkByPatientTherapyController
    Route::resource('walkByPatientTherapy', WalkByPatientTherapyController::class);

    Route::controller(WalkByPatientTherapyController::class)->group(function () {
        Route::get('/therapyPackageListForSingleTherapy', 'therapyPackageListForSingleTherapy')->name('therapyPackageListForSingleTherapy');
        Route::get('/therapyListForSingleTherapy', 'therapyListForSingleTherapy')->name('therapyListForSingleTherapy');
        Route::get('/getTherapyType', 'getTherapyType')->name('getTherapyType');
        Route::post('/patientFinalSubmit', 'patientFinalSubmit')->name('patientFinalSubmit');
        Route::get('/searchPatientForTherapy', 'searchPatientForTherapy')->name('searchPatientForTherapy');
       Route::get('/walkByPatientTherapyMain', 'walkByPatientTherapyMain')->name('walkByPatientTherapyMain');
   });


    //WalkByPatientTherapyController

    //revisedBilling_controller
    Route::resource('revisedBillings', RevisedBillingController::class);
    //revisedBilling_controller


    //doctor_apoinment_controller
    Route::resource('doctorAppointments', DoctorAppointmentController::class);
    //doctor_apointment_controller

    Route::controller(DoctorAppointmentController::class)->group(function () {

        Route::get('/checkAppoinmentInfo', 'checkAppoinmentInfo')->name('checkAppoinmentInfo');


    });

     //billing_controller
     Route::resource('billings', BillingController::class);

     Route::controller(BillingController::class)->group(function () {
          Route::get('/medicineList/{id}', 'medicineList')->name('medicineList');
          Route::get('/therapyListFromHistory/{id}', 'therapyListFromHistory')->name('therapyListFromHistory');


         Route::post('/paymentMoney', 'paymentMoney')->name('paymentMoney');
         Route::get('/printInvoice/{id}', 'printInvoice')->name('printInvoice');
         Route::get('/moveToReversed/{id}', 'moveToReversed')->name('moveToReversed');
     });
     //billing_controller


     //walk_by_patient_route
     Route::resource('walkByPatients', WalkByPatientController::class);

     Route::controller(WalkByPatientController::class)->group(function () {

       Route::get('/transferToPatientList/{id}', 'transferToPatientList')->name('transferToPatientList');
   });
   //end_walk_by_patient_route



    //waiting_list_controller

    Route::controller(DoctorWaitingListController::class)->group(function () {


        Route::get('/typeOfHerb', 'typeOfHerb')->name('typeOfHerb');


        Route::post('/postMedicalSupplementInPrescription', 'postMedicalSupplementInPrescription')->name('postMedicalSupplementInPrescription');
        Route::post('/postHerbInPrescription', 'postHerbInPrescription')->name('postHerbInPrescription');
        Route::post('/postTherapyTypeInPrescription', 'postTherapyTypeInPrescription')->name('postTherapyTypeInPrescription');


        Route::get('/getTherapyTypeInPrescription', 'getTherapyTypeInPrescription')->name('getTherapyTypeInPrescription');

        Route::get('/addTherapyInPrescription', 'addTherapyInPrescription')->name('addTherapyInPrescription');
        Route::get('/addHerbInPrescription', 'addHerbInPrescription')->name('addHerbInPrescription');
        Route::get('/addMedicalSupplementInPrescription', 'addMedicalSupplementInPrescription')->name('addMedicalSupplementInPrescription');


        Route::get('/showDataCategoryWise', 'showDataCategoryWise')->name('showDataCategoryWise');

        Route::get('/doctorWaitingList', 'doctorWaitingList')->name('doctorWaitingList');
        Route::get('/addPatientHistory/{id}', 'addPatientHistory')->name('addPatientHistory');
        Route::get('/addPatientPrescriptionInfo/{id}', 'addPatientPrescriptionInfo')->name('addPatientPrescriptionInfo');
        Route::post('/postPatientHistory', 'postPatientHistory')->name('postPatientHistory');
        Route::post('/postPatientPrescriptionInfo', 'postPatientPrescriptionInfo')->name('postPatientPrescriptionInfo');
    });
    //end_waiting_list_controller


    //PatientPrecription_list_controller
    Route::resource('patientPrecriptions', PatientPrecriptionController::class);
    //PatientPrecription_list_controller


   //patient_route
   Route::resource('patients', PatientController::class);

   Route::controller(PatientController::class)->group(function () {

    Route::post('/saveTransferToPatientList', 'saveTransferToPatientList')->name('saveTransferToPatientList');

      Route::post('/patientFileUpdate', 'patientFileUpdate')->name('patientFileUpdate');

      Route::delete('patientFileDelete/{id}','patientFileDelete')->name('patientFileDelete');
  });
  //patient_route

   //patient_admit_route
   Route::resource('patientAdmits', PatientAdmitController::class);
  //patient_admit_route

   //doctor_route
   Route::resource('doctors', DoctorController::class);
  //doctor_route

  Route::resource('dietCharts', DietChartController::class);
  Route::resource('medicineLists', MedicineController::class);
  Route::resource('healthSupplements', HealthSupplementController::class);
  Route::resource('therapyLists', TherapyListController::class);
  Route::resource('therapyIngredients', TherapyIngredientController::class);


  Route::resource('medicineEquipment', MedicineEquipmentController::class);
  Route::resource('powderList', PowderController::class);
  Route::resource('packageList', PackageController::class);





  //staff route add
Route::resource('staff',StaffController::class);
//end staff route


//reward route start
Route::resource('reward',RewardController::class);
//end reward route

//therapist route
Route::resource('therapist',TherapistController::class);
//end therapist route


    Route::resource('login', LoginController::class);
    Route::post('/logout/submit',[LoginController::class,'logout'])->name('admin.logout.submit');

    Route::resource('role', RoleController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('user', AdminController::class);

    Route::resource('setting', SettingController::class);

    Route::resource('systemInformation', SystemInformationController::class);




});
