<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
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
use App\Models\PatientTherapyDetail;
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
            Session::put('doctor_appoinment', $id);
                 $doctor_appoinment = $id;
                 $therapyLists = TherapyList::latest()->get();
                 $medicineLists = Medicine::latest()->get();
                 $healthSupplements = HealthSupplement::latest()->get();
                 $allPackageList = Package::latest()->get();
            return view('admin.doctorWaitingListView.addPatientPrescriptionInfo',compact('allPackageList','healthSupplements','medicineLists','doctor_appoinment','therapyLists'));

           }


           public function postPatientPrescriptionInfo(Request $request){



            // $request->validate([
            //     'history_file' => 'required',
            //     'name.*' => 'required',
            //     'amount.*' => 'required',
            //     'herb_name.*' => 'required',
            //     'part_of_the_day.*' => 'required',
            //     'how_many_dose.*' => 'required',
            //     'main_time.*' => 'required',
            //     'package_name.*' => 'required',
            //     'package_part_of_the_day.*' => 'required',
            //     'package_how_many_dose.*' => 'required',
            //     'package_main_time.*' => 'required',
            //     'supplement_name.*' => 'required',
            //     'quantity.*' => 'required',

            // ]);

            $doctorWaitingList = DoctorAppointment::where('id',$request->appoinment_id)->first();
            $finalGetData = PatientHistory::where('doctor_appointment_id',$request->appoinment_id)->first();



            $inputAllData = $request->all();

            // $therapyName = $inputAllData['name'];
            // $herbName = $inputAllData['herb_name'];
            // $packageName = $inputAllData['package_name'];
            // $supplementName = $inputAllData['supplement_name'];


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




            $therapyList = DB::table('patient_therapies')->where('status',0)
            ->where('doctor_appointment_id',$request->appoinment_id)->update(['status' => 2]);


            $HerbList = DB::table('patient_herbs')->where('status',0)
            ->where('doctor_appointment_id',$request->appoinment_id)->update(['status' => 2]);

            $msList = DB::table('patient_medical_supplements')->where('status',0)
            ->where('doctor_appointment_id',$request->appoinment_id)->update(['status' => 2]);;










               return redirect()->route('patientPrecriptions.index')->with('success','Added successfully!');

           }


           public function showDataCategoryWise(Request $request){

            $getMainVal = $request->herb_type;
            $m_id = $request->getMainVal;

            if($getMainVal == 'Medicine'){
                $data = view('admin.doctorWaitingListView.medicineList',compact('getMainVal','m_id'))->render();
                return response()->json($data);

            }else{
                $data = view('admin.doctorWaitingListView.tabletList',compact('getMainVal','m_id'))->render();
                return response()->json($data);


            }

           }


           public function addTherapyInPrescription(){

            return view('admin.doctorWaitingListView.addTherapyInPrescription');
           }


           public function addHerbInPrescription(){

            return view('admin.doctorWaitingListView.addHerbInPrescription');
           }

           public function addMedicalSupplementInPrescription(){
            $healthSupplements = HealthSupplement::latest()->get();
            return view('admin.doctorWaitingListView.addMedicalSupplementInPrescription',compact('healthSupplements'));

           }


           public function getTherapyTypeInPrescription(Request $request){


            $getMainVal = $request->getMainVal;

            if($getMainVal == 'Single'){
                $data = view('admin.doctorWaitingListView.getTherapyTypeSingle',compact('getMainVal'))->render();
                return response()->json($data);

            }else{
                $data = view('admin.doctorWaitingListView.getTherapyTypePackage',compact('getMainVal'))->render();
                return response()->json($data);


            }




        }

        public function postTherapyTypeInPrescription(Request $request){

           // dd($request->all());

            $doctorWaitingList = DoctorAppointment::where('id',Session::get('doctor_appoinment'))->first();
            $finalGetData = PatientHistory::where('doctor_appointment_id',Session::get('doctor_appoinment'))->first();



            $inputAllData = $request->all();
            $therapyName = $inputAllData['therapy_id'];


            if($request->therapy_type == 'Single'){


            foreach($therapyName as $key => $therapyName){
                $therapyName = new PatientTherapy();
                $therapyName->name=$inputAllData['therapy_id'][$key];
                $therapyName->package_name=$request->therapy_type;
                $therapyName->therapy_type=$request->therapy_type;
                $therapyName->doctor_id    = $doctorWaitingList->doctor_id;
                $therapyName->doctor_appointment_id    =Session::get('doctor_appoinment');
                $therapyName->patient_history_id   = $finalGetData->id;
                $therapyName->patient_id   = $doctorWaitingList->patient_id;
                $therapyName->status   = 0;
                $therapyName->save();

                $therapyId = $therapyName->id;


                $color_image_main = $inputAllData["ingrident_id"];

                foreach($color_image_main as $j => $therapyNamen){
                $therapyNamen = new PatientTherapyDetail();
                $therapyNamen->ingredient_name=$inputAllData['ingrident_id'][$j];
                $therapyNamen->quantity=$inputAllData['quantity'][$j];
                $therapyNamen->unit=$inputAllData['unit'][$j];
                $therapyNamen->patient_therapy_id=$therapyId;
                $therapyNamen->save();
                }

               }
            }else{


                foreach($therapyName as $key => $therapyName){
                    $therapyName = new PatientTherapy();
                    $therapyName->name=$inputAllData['therapy_id'][$key];
                    $therapyName->package_name=$request->therapy_package_id;
                    $therapyName->therapy_type=$request->therapy_type;
                    $therapyName->doctor_id    = $doctorWaitingList->doctor_id;
                    $therapyName->doctor_appointment_id    =Session::get('doctor_appoinment');
                    $therapyName->patient_history_id   = $finalGetData->id;
                    $therapyName->patient_id   = $doctorWaitingList->patient_id;
                    $therapyName->status   = 0;
                    $therapyName->save();

                    $therapyId = $therapyName->id;

                    if (array_key_exists("ingrident_id".$key, $inputAllData)){


                    $color_image_main = $inputAllData["ingrident_id".$key];

                    foreach($color_image_main as $j => $therapyNamen){
                    $therapyNamen = new PatientTherapyDetail();
                    $therapyNamen->ingredient_name=$inputAllData['ingrident_id'.$key][$j];
                    $therapyNamen->quantity=$inputAllData['quantity'.$key][$j];
                    $therapyNamen->unit=$inputAllData['unit'.$key][$j];
                    $therapyNamen->patient_therapy_id=$therapyId;
                    $therapyNamen->save();
                    }

                }

                   }


            }

            return redirect('admin/addPatientPrescriptionInfo/'.Session::get('doctor_appoinment'));

        }


        public function postHerbInPrescription(Request $request){



            $doctorWaitingList = DoctorAppointment::where('id',Session::get('doctor_appoinment'))->first();
            $finalGetData = PatientHistory::where('doctor_appointment_id',Session::get('doctor_appoinment'))->first();



            $inputAllData = $request->all();
            $herbName = $inputAllData['herb_type'];
            $mName = $inputAllData['mingrident_id'];

            //dd($inputAllData);

            foreach($herbName as $key => $herbName){
                $herbName = new PatientHerb();
                $herbName->name=$inputAllData['herb_type'][$key];
                if (array_key_exists("mingrident_id".$key, $inputAllData)){
                $mName = $inputAllData['mingrident_id'][$key];
                $st = implode(" ",$mName);
                $herbName->package_name=$st;
                }else{
                    if (array_key_exists("tablet_name".$key, $inputAllData)){
                    $herbName->package_name=$inputAllData['tablet_name'][$key];
                    }
                }
                $herbName->how_many_dose=$inputAllData['hquantity'][$key];
                $herbName->main_time=$inputAllData['hunit'][$key];
                $herbName->doctor_id    = $doctorWaitingList->doctor_id;
                $herbName->doctor_appointment_id    = Session::get('doctor_appoinment');
                $herbName->patient_history_id   = $finalGetData->id;
                $herbName->patient_id   = $doctorWaitingList->patient_id;
                $herbName->status   = 0;
                $herbName->save();

               }

               return redirect('admin/addPatientPrescriptionInfo/'.Session::get('doctor_appoinment'));
        }


        public function postMedicalSupplementInPrescription(Request $request){

            $doctorWaitingList = DoctorAppointment::where('id',Session::get('doctor_appoinment'))->first();
            $finalGetData = PatientHistory::where('doctor_appointment_id',Session::get('doctor_appoinment'))->first();



            $inputAllData = $request->all();


            $supplementName = $inputAllData['supplement_name'];



            foreach($supplementName as $key => $supplementName){
                $supplementName = new PatientMedicalSupplement();
                $supplementName->name=$inputAllData['supplement_name'][$key];
                $supplementName->quantity=$inputAllData['quantity'][$key];
                $supplementName->doctor_id    = $doctorWaitingList->doctor_id;
                $supplementName->doctor_appointment_id    = Session::get('doctor_appoinment');
                $supplementName->patient_history_id   = $finalGetData->id;
                $supplementName->patient_id   = $doctorWaitingList->patient_id;
                $supplementName->status   = 0;
                $supplementName->save();

               }



            return redirect('admin/addPatientPrescriptionInfo/'.Session::get('doctor_appoinment'));


        }
}
