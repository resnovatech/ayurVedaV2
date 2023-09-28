<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Doctor;
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
use App\Models\Package;
use App\Models\PatientPackage;
use App\Models\Therapist;
use App\Models\TherapyAppointment;
use App\Models\TherapyAppointmentDateAndTime;
use App\Models\TherapyAppointmentDetail;
use App\Models\Payment;
use App\Models\Bill;
use PDF;
use App\Models\FacePackAppoinmentDetail;
use App\Models\FacePack;
use App\Models\FacePackDetail;
class BillingController extends Controller
{
    public function index(){

        $patientHistory = PatientHistory::where('bill_status','=',null)->latest()->get();
        //dd(1);
        return view('admin.bill.index',compact('patientHistory'));
    }


    public function printInvoice($id){
        
       
         
         
          $ffB = Bill::where('patient_id',$id)->orderBy('id','desc')->first();
        $mainId = $id;
        
        
        $paymentP = DB::table('payments')->where('bill_id',$id )->orderBy('id','desc')->first();
        $paymentPa = DB::table('payments')->where('bill_id',$id )->sum('advance_amount');
         
         
        
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
        ->where('patient_reg_id',$patientHistory->patient_id)->value('phone_or_mobile_number');
$getPhoneFromPatient = DB::table('patients')
        ->where('patient_id',$patientHistory->patient_id)->value('phone_or_mobile_number');


        $getAddressFromWalkByPatient = DB::table('walk_by_patients')
                                      ->where('patient_reg_id',$patientHistory->patient_id)->value('address');
        $getAddressFromPatient = DB::table('patients')
                                      ->where('patient_id',$patientHistory->patient_id)->value('address');

                                      $getNameFromWalkByPatient = DB::table('walk_by_patients')
                                      ->where('patient_reg_id',$patientHistory->patient_id)->value('name');
                                      $getNameFromPatient = DB::table('patients')
                                      ->where('patient_id',$patientHistory->patient_id)->value('name');

                                      $getAllPaymentHistoryAmount = Payment::where('bill_id',$patientHistory->id)->sum('payment_amount');
                                     $getAllPaymentHistory = Payment::where('bill_id',$patientHistory->id)->latest()->get();


        $file_Name_Custome = 'Invoice_main';


        $pdf=PDF::loadView('admin.bill.printInvoice',[
            'paymentPa'=>$paymentPa,
            'paymentP'=>$paymentP,
            'ffB'=>$ffB,
            'totalFacialAmount'=>$totalFacialAmount,
            'singleFacePackageList'=>$singleFacePackageList,
            'mainTotal'=>$mainTotal,
            'singleTheList'=>$singleTheList,
            'singlePackageList'=>$singlePackageList,
            'totalTheAmountsingle'=>$totalTheAmountsingle,
            'totalTherapyAmount1'=>$totalTherapyAmount1,
            'totalTherapyAmountsingle'=>$totalTherapyAmountsingle,
            'patientTherapyListSingle'=>$patientTherapyListSingle,
            'patientHistory'=>$patientHistory,
            'mainId'=>$mainId,
            'patientTherapyList'=>$patientTherapyList,
            'patientHerb'=>$patientHerb,
            'patientMedicalSupplement'=>$patientMedicalSupplement,

        'getAllPaymentHistoryAmount'=>$getAllPaymentHistoryAmount,
        'getAllPaymentHistory'=>$getAllPaymentHistory,
        'getNameFromPatient'=>$getNameFromPatient,
        'getNameFromWalkByPatient'=>$getNameFromWalkByPatient,
        'getAddressFromPatient'=>$getAddressFromPatient,
        'getAddressFromWalkByPatient'=>$getAddressFromWalkByPatient,
        'totalPatientMedicalSupplementAmount'=>$totalPatientMedicalSupplementAmount,
        'totalMedicineAmount'=>$totalMedicineAmount,
        'totalTherapyAmount'=>$totalTherapyAmount,'getPhoneFromPatient'=>$getPhoneFromPatient,
        'getPhoneFromWalkByPatient'=>$getPhoneFromWalkByPatient],[],['format' => 'A4']);
    return $pdf->stream($file_Name_Custome.''.'.pdf');


    }


    public function therapyListFromHistory($id){

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

        $mainTotal = $totalTheAmountsingle + $totalTherapyAmount1 + $totalTherapyAmountsingle + $totalTherapyAmount +$totalMedicineAmount + $totalPatientMedicalSupplementAmount;

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


        $file_Name_Custome = 'TherapyList';


        $pdf=PDF::loadView('admin.bill.therapyListFromHistory',[
            'singleTheList'=>$singleTheList,
            'singlePackageList'=>$singlePackageList,
            'totalTheAmountsingle'=>$totalTheAmountsingle,
            'totalTherapyAmount1'=>$totalTherapyAmount1,
            'totalTherapyAmountsingle'=>$totalTherapyAmountsingle,
            'patientTherapyListSingle'=>$patientTherapyListSingle,
            'patientHistory'=>$patientHistory,
            'mainId'=>$mainId,
            'patientTherapyList'=>$patientTherapyList,
            'patientHerb'=>$patientHerb,
            'patientMedicalSupplement'=>$patientMedicalSupplement,

        'getAllPaymentHistoryAmount'=>$getAllPaymentHistoryAmount,
        'getAllPaymentHistory'=>$getAllPaymentHistory,
        'getNameFromPatient'=>$getNameFromPatient,
        'getNameFromWalkByPatient'=>$getNameFromWalkByPatient,
        'totalPatientMedicalSupplementAmount'=>$totalPatientMedicalSupplementAmount,
        'totalMedicineAmount'=>$totalMedicineAmount,
        'totalTherapyAmount'=>$totalTherapyAmount,'getPhoneFromPatient'=>$getPhoneFromPatient,
        'getPhoneFromWalkByPatient'=>$getPhoneFromWalkByPatient],[],['format' => 'A4']);
    return $pdf->stream($file_Name_Custome.''.'.pdf');



    }


    public function medicineList($id){

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

        $mainTotal = $totalTheAmountsingle + $totalTherapyAmount1 + $totalTherapyAmountsingle + $totalTherapyAmount +$totalMedicineAmount + $totalPatientMedicalSupplementAmount;

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


        $file_Name_Custome = 'MedicineList';


        $pdf=PDF::loadView('admin.bill.medicineList',[
            'singleTheList'=>$singleTheList,
            'singlePackageList'=>$singlePackageList,
            'totalTheAmountsingle'=>$totalTheAmountsingle,
            'totalTherapyAmount1'=>$totalTherapyAmount1,
            'totalTherapyAmountsingle'=>$totalTherapyAmountsingle,
            'patientTherapyListSingle'=>$patientTherapyListSingle,
            'patientHistory'=>$patientHistory,
            'mainId'=>$mainId,
            'patientTherapyList'=>$patientTherapyList,
            'patientHerb'=>$patientHerb,
            'patientMedicalSupplement'=>$patientMedicalSupplement,

        'getAllPaymentHistoryAmount'=>$getAllPaymentHistoryAmount,
        'getAllPaymentHistory'=>$getAllPaymentHistory,
        'getNameFromPatient'=>$getNameFromPatient,
        'getNameFromWalkByPatient'=>$getNameFromWalkByPatient,
        'totalPatientMedicalSupplementAmount'=>$totalPatientMedicalSupplementAmount,
        'totalMedicineAmount'=>$totalMedicineAmount,
        'totalTherapyAmount'=>$totalTherapyAmount,'getPhoneFromPatient'=>$getPhoneFromPatient,
        'getPhoneFromWalkByPatient'=>$getPhoneFromWalkByPatient],[],['format' => 'A4']);
    return $pdf->stream($file_Name_Custome.''.'.pdf');



    }


    public function show($id){
        
        $ffB = Bill::where('patient_id',$id)->orderBy('id','desc')->first();
        $mainId = $id;
        
        
        $paymentP = DB::table('payments')->where('bill_id',$id )->orderBy('id','desc')->first();
        $paymentPa = DB::table('payments')->where('bill_id',$id )->sum('advance_amount');

        //dd($mainId );
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

        return view('admin.bill.show',compact('paymentPa','paymentP','ffB','singleFacePackageList','totalFacialAmount','mainTotal','singleTheList','singlePackageList','totalTheAmountsingle','totalTherapyAmount1','totalTherapyAmountsingle','patientTherapyListSingle','totalPackageAmount','getAllPaymentHistoryAmount','getAllPaymentHistory','getNameFromPatient','getNameFromWalkByPatient','totalPatientMedicalSupplementAmount','totalMedicineAmount','totalTherapyAmount','getPhoneFromPatient','getPhoneFromWalkByPatient','patientHistory','mainId','patientTherapyList','patientHerb','patientPackage','patientMedicalSupplement'));

    }


    public function paymentMoney(Request $request){

    //dd($request->all());
    
    if($request->pstep == 'dstep'){
        
        
        $paymentP = DB::table('payments')->where('bill_id',$request->id )->orderBy('id','desc')->first();
        
        $calresult = $request->due_amount - $request->advance_amount;
        
         $new_payment = new Payment();
    $new_payment->bill_id = $request->id;
    $new_payment->payment_type = $request->payment_type;
    $new_payment->payment_amount = $paymentP->payment_amount;
    $new_payment->main_discount = $paymentP->main_discount;
    $new_payment->all_discount = $paymentP->all_discount;
    $new_payment->special_discount = $paymentP->special_discount;
    $new_payment->vat = $paymentP->vat;
    $new_payment->net_amount = $paymentP->net_amount;
    $new_payment->round_off = $paymentP->round_off;
    $new_payment->grand_total = $paymentP->grand_total;
    $new_payment->advance_amount = $request->advance_amount;
    $new_payment->due_amount = $calresult;
    if($calresult == 0){
        $new_payment->status = 3;
        
    }else{
        
        $new_payment->status = 2;
    }
    $new_payment->save();
    
    
    }else{

    $new_payment = new Payment();
    $new_payment->bill_id = $request->id;
    $new_payment->payment_type = $request->payment_type;
    $new_payment->payment_amount = $request->amount;
    $new_payment->main_discount = $request->main_discount;
    $new_payment->all_discount = $request->all_discount;
    $new_payment->special_discount = $request->special_discount;
    $new_payment->vat = $request->vat;
    $new_payment->net_amount = $request->net_amount;
    $new_payment->round_off = $request->round_off;
    $new_payment->grand_total = $request->grand_total;
    $new_payment->advance_amount = $request->advance_amount;
    $new_payment->due_amount = $request->due_amount;
    $new_payment->status = 1;
    $new_payment->save();
}
    return redirect()->back()->with('success','paid');

    }

    public function moveToReversed($id){

    $new_payment = PatientHistory::find($id);
    $new_payment->bill_status = 1;
    $new_payment->save();
    return redirect()->route('revisedBillings.index')->with('success','Updated');
    }
}
