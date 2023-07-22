<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
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
class BillingController extends Controller
{
    public function index(){

        $patientHistory = PatientHistory::where('bill_status','=',null)->latest()->get();
        //dd(1);
        return view('admin.bill.index',compact('patientHistory'));
    }


    public function printInvoice($id){
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


        $file_Name_Custome = 'TherapyList';


        $pdf=PDF::loadView('admin.bill.therapyListFromHistory',[
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


        $file_Name_Custome = 'MedicineList';


        $pdf=PDF::loadView('admin.bill.medicineList',[
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

        return view('admin.bill.show',compact('totalTherapyAmountsingle','patientTherapyListSingle','totalPackageAmount','getAllPaymentHistoryAmount','getAllPaymentHistory','getNameFromPatient','getNameFromWalkByPatient','totalPatientMedicalSupplementAmount','totalMedicineAmount','totalTherapyAmount','getPhoneFromPatient','getPhoneFromWalkByPatient','patientHistory','mainId','patientTherapyList','patientHerb','patientPackage','patientMedicalSupplement'));

    }


    public function paymentMoney(Request $request){

    //dd($request->all());

    $new_payment = new Payment();
    $new_payment->bill_id = $request->id;
    $new_payment->payment_type = $request->payment_type;
    $new_payment->payment_amount = $request->amount;
    $new_payment->save();

    return redirect()->back()->with('success','paid');

    }

    public function moveToReversed($id){

    $new_payment = PatientHistory::find($id);
    $new_payment->bill_status = 1;
    $new_payment->save();
    return redirect()->route('revisedBillings.index')->with('success','Updated');
    }
}
