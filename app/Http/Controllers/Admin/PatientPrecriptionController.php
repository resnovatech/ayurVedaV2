<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\WalkByPatient;
use App\Models\DoctorAppointment;
use App\Models\PatientHistory;
use App\Models\TherapyList;
use App\Models\Medicine;
use App\Models\HealthSupplement;
use App\Models\PatientTherapy;
use App\Models\PatientHerb;
use App\Models\PatientMedicalSupplement;

use DB;
use App\Models\Package;
use App\Models\PatientPackage;
use App\Models\Therapist;
use App\Models\TherapyAppointment;
use App\Models\TherapyAppointmentDateAndTime;
use App\Models\TherapyAppointmentDetail;
use App\Models\Payment;
use PDF;
class PatientPrecriptionController extends Controller
{
    public function index(){

        $getHistoryData = PatientHistory::where('status',0)->latest()->get();
        return view('admin.prescriptionList.index',compact('getHistoryData'));
    }

     public function show($id){
        $mainId = $id;
        $patientHistory = PatientHistory::find($id);


        $patientTherapyList =  PatientTherapy::where('patient_history_id',$id)->where('therapy_type','Package')
        ->latest()->get();

        $patientTherapyListSingle =  PatientTherapy::where('patient_history_id',$id)->where('therapy_type','Single')
        ->latest()->get();

   $countpatientTherapyList = count($patientTherapyList);
$totalTherapyAmount = 0 ;
$totalTherapyAmountsingle = 0 ;
///new code
foreach($patientTherapyList as $key=>$allPatientTherapyList){
    $getTherapyPriceName = DB::table('therapy_lists')->where('id',$allPatientTherapyList->name)->value('name');
    $getPackage = DB::table('therapy_packages')->where('id',$allPatientTherapyList->package_name)->value('package_name');
    $getPatientTheraPrice = DB::table('therapy_packages')->where('id',$allPatientTherapyList->package_name)->value('price');

    if(($key+1) == $countpatientTherapyList){
    $totalTherapyAmount = $totalTherapyAmount + ($allPatientTherapyList->amount*$getPatientTheraPrice);
    }

}

foreach($patientTherapyListSingle as $key=>$allPatientTherapyList){

    $getTherapyPrice = DB::table('therapy_lists')->where('id',$allPatientTherapyList->name)->value('amount');
$getTherapyPriceName = DB::table('therapy_lists')->where('id',$allPatientTherapyList->name)->value('name');

$totalTherapyAmountsingle = $totalTherapyAmountsingle + ($allPatientTherapyList->amount*$getTherapyPrice);

}

//dd($totalTherapyAmount);

///end new code



        $patientHerb = PatientHerb::where('patient_history_id',$id)->latest()->get();

        $countpatientHerb = count($patientHerb);
        $totalMedicineAmount = 0 ;
        ///new code
        foreach($patientHerb as $key=>$allPatientHerbList){


            $getPatientHerb = DB::table('medicines')->where('name',$allPatientHerbList->name)->value('amount');
$getPackage = DB::table('packages')->where('id',$allPatientHerbList->package_name)->value('name');
$getPatientHerb = DB::table('packages')->where('id',$allPatientHerbList->package_name)->value('amount');


if(($key+1) == $countpatientHerb){
            $totalMedicineAmount =$getPatientHerb;
}

        }


        $patientPackage = PatientPackage::where('patient_history_id',$id)->latest()->get();


        $totalPackageAmount = 0 ;
        ///new code
        foreach($patientPackage as $allPatientPackageList){


            $getPatientPackage = Package::where('name',$allPatientPackageList->name)->value('amount');



            $totalPackageAmount = $totalPackageAmount + ($getPatientPackage*$allPatientPackageList->how_many_dose);


        }

        //dd($totalMedicineAmount);
        ///end new code



        $patientMedicalSupplement = PatientMedicalSupplement::where('patient_history_id',$id)->latest()->get();


        $totalPatientMedicalSupplementAmount = 0 ;
        ///new code
        foreach($patientMedicalSupplement as $allPatientMedicalSupplement){


            $getPatientMedicalSupplement = HealthSupplement::where('name',$allPatientMedicalSupplement->name)->value('amount');

            $totalPatientMedicalSupplementAmount = $totalPatientMedicalSupplementAmount + ($getPatientMedicalSupplement*$allPatientMedicalSupplement->quantity);


        }


        ///end new codehh

        $mainTotal = $totalTherapyAmountsingle + $totalTherapyAmount +$totalMedicineAmount + $totalPatientMedicalSupplementAmount;

        //dd($mainTotal);

        $getPhoneFromWalkByPatient = DB::table('walk_by_patients')
                                      ->where('patient_reg_id',$patientHistory->patient_id)->value('address');
        $getPhoneFromPatient = DB::table('patients')
                                      ->where('patient_id',$patientHistory->patient_id)->value('address');

                                      $getNameFromWalkByPatient = DB::table('walk_by_patients')
                                      ->where('patient_reg_id',$patientHistory->patient_id)->value('name');
                                      $getNameFromPatient = DB::table('patients')
                                      ->where('patient_id',$patientHistory->patient_id)->value('name');

                                      $getAllPaymentHistoryAmount = Payment::where('bill_id',$patientHistory->id)->sum('payment_amount');
                                     $getAllPaymentHistory = Payment::where('bill_id',$patientHistory->id)->latest()->get();

        return view('admin.prescriptionList.show',compact('totalTherapyAmountsingle','patientTherapyListSingle','totalPackageAmount','getAllPaymentHistoryAmount','getAllPaymentHistory','getNameFromPatient','getNameFromWalkByPatient','totalPatientMedicalSupplementAmount','totalMedicineAmount','totalTherapyAmount','getPhoneFromPatient','getPhoneFromWalkByPatient','patientHistory','mainId','patientTherapyList','patientHerb','patientPackage','patientMedicalSupplement'));
    }
}
