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


     //walk_by_patient_route
     Route::resource('walkByPatients', WalkByPatientController::class);

     Route::controller(WalkByPatientController::class)->group(function () {

       Route::get('/transferToPatientList/{id}', 'transferToPatientList')->name('transferToPatientList');
   });
   //end_walk_by_patient_route


   //patient_route
   Route::resource('patients', PatientController::class);

   Route::controller(PatientController::class)->group(function () {

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


    Route::resource('login', LoginController::class);
    Route::post('/logout/submit',[LoginController::class,'logout'])->name('admin.logout.submit');

    Route::resource('role', RoleController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('user', AdminController::class);

    Route::resource('setting', SettingController::class);

    Route::resource('systemInformation', SystemInformationController::class);




});
