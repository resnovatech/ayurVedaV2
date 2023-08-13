<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\PatientPackage;
use App\Models\PatientMainTherapy;
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
use App\Models\Therapist;
use App\Models\TherapyAppointment;
use App\Models\TherapyAppointmentDateAndTime;
use App\Models\TherapyAppointmentDetail;
use App\Models\FacePackAppoinmentDetail;
use App\Models\FacePack;
use App\Models\Payment;
use PDF;
class RevisedBillingController extends Controller
{
    public function index(){

        $patientHistory = PatientHistory::where('bill_status','=',1)->latest()->get();

        return view('admin.revisedBill.index',compact('patientHistory'));
    }

    public function show($id){
        $mainId = $id;
        $patientHistory = PatientHistory::find($id);

         //facepack code

         $singleFacePackageList = FacePackAppoinmentDetail::
         where('history_id',$id)->latest()->get();

         $countSingleFacePackageList = count($singleFacePackageList);
         $totalFacialAmount = 0 ;

         foreach($singleFacePackageList as $allSingleFacePackageList){


             $getFacePack = FacePack::where('id',$allSingleFacePackageList->face_pack_id)->value('amount');

             $totalFacialAmount = $totalFacialAmount + ($getFacePack*$allSingleFacePackageList->quantity);


         }

         //end facepack code

        //new code

//package
 $singlePackageList = PatientMainTherapy::where('patient_history_id',$id)
 ->whereNotNull('therapy_package_id')->latest()->get();


 $countpatientTherapyList1 = count($singlePackageList);
 $totalTherapyAmount1 = 0 ;
 $totalTherapyAmountsingle1 = 0 ;
 ///new code
 foreach($singlePackageList as $key=>$allPatientTherapyList){
     $getTherapyPriceName1 = DB::table('therapy_lists')->where('name',$allPatientTherapyList->name)->value('name');
     $getPackage1 = DB::table('therapy_packages')->where('id',$allPatientTherapyList->therapy_package_id)->value('package_name');
     $getPatientTheraPrice1 = DB::table('therapy_packages')->where('id',$allPatientTherapyList->therapy_package_id)->value('price');

     if(($key+1) == $countpatientTherapyList1){
     $totalTherapyAmount1 = $totalTherapyAmount1 + ($allPatientTherapyList->amount*$getPatientTheraPrice1);
     }

 }

//endpackage

//single
$singleTheList = PatientMainTherapy::where('patient_history_id',$id)
->whereNull('therapy_package_id')->latest()->get();
$totalTheAmountsingle = 0;
foreach($singleTheList as $key=>$allPatientTherapyList){

    $getTherapyPrices = DB::table('therapy_lists')->where('name',$allPatientTherapyList->name)->value('amount');
$getTherapyPriceNames = DB::table('therapy_lists')->where('name',$allPatientTherapyList->name)->value('name');

$totalTheAmountsingle = $totalTheAmountsingle + ($allPatientTherapyList->amount*$getTherapyPrices);

}

//endsingle


//end new code


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

        $mainTotal = $totalFacialAmount + $totalTheAmountsingle + $totalTherapyAmount1 + $totalTherapyAmountsingle + $totalTherapyAmount +$totalMedicineAmount + $totalPatientMedicalSupplementAmount;

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

        return view('admin.revisedBill.show',compact('singleFacePackageList','totalFacialAmount','mainTotal','singleTheList','singlePackageList','totalTheAmountsingle','totalTherapyAmount1','totalTherapyAmountsingle','patientTherapyListSingle','totalPackageAmount','getAllPaymentHistoryAmount','getAllPaymentHistory','getNameFromPatient','getNameFromWalkByPatient','totalPatientMedicalSupplementAmount','totalMedicineAmount','totalTherapyAmount','getPhoneFromPatient','getPhoneFromWalkByPatient','patientHistory','mainId','patientTherapyList','patientHerb','patientPackage','patientMedicalSupplement'));



    }


    public function store(Request $request){

       // dd($request->all());

        $inputAllData = $request->all();




        if (array_key_exists("new_face_pack_id", $inputAllData)){
            $newTherapyName1 = $inputAllData['new_face_pack_id'];
            foreach($newTherapyName1 as $key => $newTherapyName1){
             $newTherapyName1 = FacePackAppoinmentDetail::find($inputAllData['new_face_pack_id'][$key]);
             $newTherapyName1->quantity=$inputAllData['new_face_pack_quantity'][$key];
             $newTherapyName1->save();

            }
         }



         if (array_key_exists("new_therapy_id", $inputAllData)){
            $newTherapyName = $inputAllData['new_therapy_id'];
            foreach($newTherapyName as $key => $newTherapyName){
             $newTherapyName = PatientMainTherapy::find($inputAllData['new_therapy_id'][$key]);
             $newTherapyName->amount=$inputAllData['new_therapy_amount'][$key];
             $newTherapyName->save();

            }
         }


         if (array_key_exists("suppliment_id", $inputAllData)){
            $supplimentName = $inputAllData['suppliment_id'];
         foreach($supplimentName as $key => $supplimentName){
            $supplimentName = PatientMedicalSupplement::find($inputAllData['suppliment_id'][$key]);
            $supplimentName->quantity=$inputAllData['suppliment_amount'][$key];
            $supplimentName->save();

           }

        }

        if (array_key_exists("therapy_id", $inputAllData)){
            $therapyName = $inputAllData['therapy_id'];
           foreach($therapyName as $key => $therapyName){
            $therapyName = PatientTherapy::find($inputAllData['therapy_id'][$key]);
            $therapyName->amount=$inputAllData['therapy_amount'][$key];
            $therapyName->save();

           }

        }

        if (array_key_exists("herb_id", $inputAllData)){
            $medicineName = $inputAllData['herb_id'];
           foreach($medicineName as $key => $medicineName){
            $medicineName = PatientHerb::find($inputAllData['herb_id'][$key]);
            $medicineName->how_many_dose=$inputAllData['herb_amount'][$key];
            $medicineName->save();

           }
        }
           return redirect()->route('revisedBillings.index')->with('success','Updated');
    }
}
