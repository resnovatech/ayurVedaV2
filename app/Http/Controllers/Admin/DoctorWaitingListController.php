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
use App\Models\Package;
use App\Models\PatientPackage;
use App\Models\HealthSupplement;
use App\Models\PatientTherapy;
use App\Models\PatientHerb;
use App\Models\PatientMedicalSupplement;
class DoctorWaitingListController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }



    public function doctorWaitingList(){


        if (is_null($this->user) || !$this->user->can('doctorWaitingListView')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

          $doctorWaitingList = DoctorAppointment::where('appointment_date',date('Y-m-d'))->where('status','=',null)->latest()->get();



               return view('admin.doctorWaitingListView.index',compact('doctorWaitingList'));
           }


           public function addPatientHistory($id){

             $doctorWaitingList = DoctorAppointment::where('id',$id)->first();
             $walkByPatientList = WalkByPatient::where('patient_reg_id',$doctorWaitingList->patient_id)->get();



             if(count($walkByPatientList) == 0){

               $patientList = Patient::where('patient_id',$doctorWaitingList->patient_id)->first();
               $patientType = "Patient";

             }else{
                $patientList = WalkByPatient::where('patient_reg_id',$doctorWaitingList->patient_id)->first();
                $patientType = "Walk By Patient";
             }

             $getPatientHistoryData = PatientHistory::where('doctor_appointment_id',$id)->value('admin_id');

              if(empty($getPatientHistoryData)){

                $finalGetData = 0;

              }else{

                $finalGetData = PatientHistory::where('doctor_appointment_id',$id)->first();
              }


            return view('admin.doctorWaitingListView.addPatientHistory',compact('doctorWaitingList','patientList','patientType','getPatientHistoryData','finalGetData'));

           }


           public function postPatientHistory(Request $request){

            if (is_null($this->user) || !$this->user->can('doctorWaitingListAdd')) {
                abort(403, 'Sorry !! You are Unauthorized to View !');
                   }


                   $input = $request->all();
//dd($input);
                   PatientHistory::create($input);




          return redirect('admin/addPatientPrescriptionInfo/'.$request->doctor_appointment_id)->with('success','Added successfully!');

           }


           public function addPatientPrescriptionInfo($id){

                 $doctor_appoinment = $id;
                 $therapyLists = TherapyList::latest()->get();
                 $medicineLists = Medicine::latest()->get();
                 $healthSupplements = HealthSupplement::latest()->get();
                 $allPackageList = Package::latest()->get();
            return view('admin.doctorWaitingListView.addPatientPrescriptionInfo',compact('allPackageList','healthSupplements','medicineLists','doctor_appoinment','therapyLists'));

           }


           public function postPatientPrescriptionInfo(Request $request){



            $request->validate([
                'history_file' => 'required',
                'name.*' => 'required',
                'amount.*' => 'required',
                'herb_name.*' => 'required',
                'part_of_the_day.*' => 'required',
                'how_many_dose.*' => 'required',
                'main_time.*' => 'required',
                'package_name.*' => 'required',
                'package_part_of_the_day.*' => 'required',
                'package_how_many_dose.*' => 'required',
                'package_main_time.*' => 'required',
                'supplement_name.*' => 'required',
                'quantity.*' => 'required',

            ]);

            $doctorWaitingList = DoctorAppointment::where('id',$request->appoinment_id)->first();
            $finalGetData = PatientHistory::where('doctor_appointment_id',$request->appoinment_id)->first();



            $inputAllData = $request->all();

            $therapyName = $inputAllData['name'];
            $herbName = $inputAllData['herb_name'];
            $packageName = $inputAllData['package_name'];
            $supplementName = $inputAllData['supplement_name'];


            $doctorAppointment = DoctorAppointment::find($request->appoinment_id);
            $doctorAppointment->status =1;
            $doctorAppointment->save();


            $patientHistory = PatientHistory::find($finalGetData->id);
            if ($request->hasfile('history_file')) {
                $file = $request->file('history_file');
                $extension = $file->getClientOriginalName();
                $filename = $extension;
                $file->move('public/uploads/', $filename);
                $patientHistory->history_file =  'public/uploads/'.$filename;

            }
            $patientHistory->status = 0;

            $patientHistory->save();




            foreach($supplementName as $key => $supplementName){
                $supplementName = new PatientMedicalSupplement();
                $supplementName->name=$inputAllData['supplement_name'][$key];
                $supplementName->quantity=$inputAllData['quantity'][$key];
                $supplementName->doctor_id    = $doctorWaitingList->doctor_id;
                $supplementName->doctor_appointment_id    = $request->appoinment_id;
                $supplementName->patient_history_id   = $finalGetData->id;
                $supplementName->patient_id   = $doctorWaitingList->patient_id;
                $supplementName->save();

               }




               foreach($therapyName as $key => $therapyName){
                $therapyName = new PatientTherapy();
                $therapyName->name=$inputAllData['name'][$key];
                $therapyName->amount=$inputAllData['amount'][$key];
                $therapyName->doctor_id    = $doctorWaitingList->doctor_id;
                $therapyName->doctor_appointment_id    =$request->appoinment_id;
                $therapyName->patient_history_id   = $finalGetData->id;
                $therapyName->patient_id   = $doctorWaitingList->patient_id;
                $therapyName->save();

               }


               foreach($herbName as $key => $herbName){
                $herbName = new PatientHerb();
                $herbName->name=$inputAllData['herb_name'][$key];
                $herbName->part_of_the_day=$inputAllData['part_of_the_day'][$key];
                $herbName->how_many_dose=$inputAllData['how_many_dose'][$key];
                $herbName->main_time=$inputAllData['main_time'][$key];
                $herbName->doctor_id    = $doctorWaitingList->doctor_id;
                $herbName->doctor_appointment_id    = $request->appoinment_id;
                $herbName->patient_history_id   = $finalGetData->id;
                $herbName->patient_id   = $doctorWaitingList->patient_id;
                $herbName->save();

               }


               foreach($packageName as $key => $packageName){
                $packageName = new PatientPackage();
                $packageName->name=$inputAllData['package_name'][$key];
                $packageName->part_of_the_day=$inputAllData['package_part_of_the_day'][$key];
                $packageName->how_many_dose=$inputAllData['package_how_many_dose'][$key];
                $packageName->main_time=$inputAllData['package_main_time'][$key];
                $packageName->doctor_id    = $doctorWaitingList->doctor_id;
                $packageName->doctor_appointment_id    = $request->appoinment_id;
                $packageName->patient_history_id   = $finalGetData->id;
                $packageName->patient_id   = $doctorWaitingList->patient_id;
                $packageName->save();

               }


               return redirect()->route('patientPrecriptions.index')->with('success','Added successfully!');

           }
}
