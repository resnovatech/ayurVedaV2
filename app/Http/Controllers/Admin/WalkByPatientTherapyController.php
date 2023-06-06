<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
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
use App\Models\TherapyPackage;
use App\Models\PatientHerb;
use App\Models\PatientMedicalSupplement;
use DB;
use Session;
use App\Models\PatientMainTherapy;
use App\Models\TherapyDetail;
use App\Models\TherapyIngredient;
use App\Models\Therapist;
use App\Models\TherapyAppointment;
use App\Models\TherapyAppointmentDateAndTime;
use App\Models\TherapyAppointmentDetail;
class WalkByPatientTherapyController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


    public function searchPatientForTherapy(Request $request)
    {




            $data = WalkByPatient::select("name as value",DB::raw("CONCAT(name,' - ',phone_or_mobile_number) as label"),"patient_reg_id as patient_reg_id", "age","email_address as email")
          ->where('patient_reg_id', 'LIKE', '%'. $request->get('search'). '%')
          ->orwhere('name', 'LIKE', '%'. $request->get('search'). '%')
          ->orwhere('phone_or_mobile_number', 'LIKE', '%'. $request->get('search'). '%')
          ->get();










return response()->json($data);





    }

    public function getTherapyType(Request $request){


        $getMainVal = $request->getMainVal;

        if($getMainVal == 'Single'){
            $data = view('admin.walkByPatientTherapy.getTherapyTypeSingle',compact('getMainVal'))->render();
            return response()->json($data);

        }else{
            $data = view('admin.walkByPatientTherapy.getTherapyTypePackage',compact('getMainVal'))->render();
            return response()->json($data);


        }




    }

    public function index(){
        if (is_null($this->user) || !$this->user->can('walkByPatientTherapyView')) {
                   abort(403, 'Sorry !! You are Unauthorized to Add !');
               }
               $therapyAppointmentDateAndTimeList = TherapyAppointmentDateAndTime::where('date',date('Y-m-d'))->latest()->get();
       //dd(1);
               return view('admin.walkByPatientTherapy.index',compact('therapyAppointmentDateAndTimeList'));
           }



    public function create(){
        if (is_null($this->user) || !$this->user->can('walkByPatientTherapyAdd')) {
                   abort(403, 'Sorry !! You are Unauthorized to Add !');
               }
               $patientHistory = WalkByPatient::latest()->get();
       //dd(1);
               return view('admin.walkByPatientTherapy.create',compact('patientHistory'));
           }


           public function walkByPatientTherapyMain(Request $request){

            $therapistList = Therapist::latest()->get();

            $totalId = $request->numberOfChecked_length;
            $nameList = $request->numberOfSubChecked;

            $data = view('admin.walkByPatientTherapy.walkByPatientTherapyMain',compact('totalId','therapistList','nameList'))->render();
            return response()->json($data);
           }

           public function therapyListForSingleTherapy(Request $request){

            $getMainVal = $request->getMainVal;

            $getIngredientData = TherapyDetail::where('therapy_list_id',$getMainVal)->latest()->get();

            $data = view('admin.walkByPatientTherapy.therapyListForSingleTherapy',compact('getIngredientData'))->render();
            return response()->json($data);

           }

           public function therapyPackageListForSingleTherapy(Request $request){

            $getMainVal = $request->getMainVal;

            $getIngredientData = TherapyPackage::where('id',$getMainVal)->value('therapy_list');

            $therapyArrayList = explode(',',$getIngredientData);

            $data = view('admin.walkByPatientTherapy.therapyPackageListForSingleTherapy',compact('therapyArrayList'))->render();
            return response()->json($data);
           }

           public function show($id){


           }



           public function store(Request $request){


            if (is_null($this->user) || !$this->user->can('walkByPatientTherapyAdd')) {
                abort(403, 'Sorry !! You are Unauthorized to Add !');
            }


           //dd($request->all());
            $request->validate([
                'patient_id' => 'required',
                'therapist_id.*' => 'required',
                'ingrident_id.*' => 'required',
                'therapy_id.*' => 'required',
                'quantity.*' => 'required',
                'unit.*' => 'required',
                'therapy.*' => 'required',
                'date.*' => 'required',
                'start_time.*' => 'required',
                'end_time.*' => 'required',

            ]);

            //dd($request->all());
            $patientId =$request->patient_id;

            Session::put('patientId', $patientId);

            $data = WalkByPatient::where('patient_reg_id','=',$patientId)->first();

            Session::put('name', $data->name);
            Session::put('age', $data->age);
            Session::put('email', $data->email_address);

           $patientHistoryUpdate = new PatientHistory();
           $patientHistoryUpdate->admin_id =Auth::guard('admin')->user()->id;
           $patientHistoryUpdate->patient_id =$patientId;
           $patientHistoryUpdate->status = 2;
           $patientHistoryUpdate->save();

           $patientHistoryUpdateId = $patientHistoryUpdate->id;


            $therapyAppointment = new TherapyAppointment();
            $therapyAppointment->admin_id =Auth::guard('admin')->user()->id;
            $therapyAppointment->patient_id =$patientId;
            $therapyAppointment->status = 0;
            $therapyAppointment->save();

            $therapyAppointmentId = $therapyAppointment->id;

            $inputAllData = $request->all();

            $therapyAppointmentDetail = $inputAllData['therapy_id'];
           // $therapistList = $inputAllData['therapist_id'];
            $therapyNameDetail = $inputAllData['therapy_id'];
           // TherapyAppointmentDateAndTime

            foreach($therapyAppointmentDetail as $key => $therapyAppointmentDetail){
                $therapyAppointmentDetail = new TherapyAppointmentDetail();
                $therapyAppointmentDetail->therapy_name=$inputAllData['therapy_id'][$key];
                $therapyAppointmentDetail->name=$inputAllData['ingrident_id'][$key];
                $therapyAppointmentDetail->amount=$inputAllData['quantity'][$key];
                $therapyAppointmentDetail->therapy_appointment_id   = $therapyAppointmentId;
                $therapyAppointmentDetail->save();

               }



               return redirect()->route('walkByPatientTherapy.create')->with('success','Added successfully!');



        }

        public function patientFinalSubmit(Request $request){

            $inputAllData = $request->all();





        $therapyHistoryId =PatientHistory::where('patient_id',Session::get('patientId'))
                  ->where('status',2)
                   ->value('id');

        $therapyAppointmentId = DB::table('therapy_appointments')
                 ->where('patient_id',Session::get('patientId'))
                  ->where('status',0)
                   ->value('id');


             $therapistList = $inputAllData['therapist_id'];
            $therapyNameDetail = $inputAllData['therapy_id'];


                foreach($therapyNameDetail as $key => $therapyNameDetail){


                $therapyName = new PatientMainTherapy();
                $therapyName->name=$inputAllData['therapy_id'][$key];
                $therapyName->therapist_id=$inputAllData['therapist_id'][$key];
                $therapyName->therapy_appointment_id=$therapyAppointmentId;
                $therapyName->amount=1;
                $therapyName->patient_history_id   = $therapyHistoryId;
                $therapyName->patient_id   = Session::get('patientId');
                $therapyName->save();

               }

                foreach($therapistList as $key => $therapistList){

                $getSerialValue =  TherapyAppointmentDateAndTime::where('therapist',$inputAllData['therapist_id'][$key])
                ->where('therapy',$inputAllData['therapy_id'][$key])
                ->where('date',$inputAllData['date'][$key])
                ->value('serial');

                if(empty($getSerialValue)){


                 $finalSerialValue = 1;

                }else{
                 $finalSerialValue = $getSerialValue + 1;

                }





                $therapistList = new TherapyAppointmentDateAndTime();
                $therapistList->therapist=$inputAllData['therapist_id'][$key];
                $therapistList->therapy=$inputAllData['therapy_id'][$key];
                $therapistList->date=$inputAllData['date'][$key];
                $therapistList->start_time=$inputAllData['start_time'][$key];
                $therapistList->end_time=$inputAllData['end_time'][$key];
                $therapistList->serial=$finalSerialValue;
                $therapistList->patient_id   = Session::get('patientId');
                $therapistList->admin_id   = Auth::guard('admin')->user()->id;
                $therapistList->therapy_appointment_id   = $therapyAppointmentId;
                $therapistList->save();

               }
               DB::table('therapy_appointments')->where('patient_id',Session::get('patientId'))
               ->where('status',0)
          ->update([
              'status' => 3
           ]);

           session()->forget(['name','age','email']);

            return redirect()->route('walkByPatientTherapy.index')->with('success','Added successfully!');
        }


        public function destroy($id)
        {

            if (is_null($this->user) || !$this->user->can('walkByPatientTherapyDelete')) {
                abort(403, 'Sorry !! You are Unauthorized to Delete !');
            }


            TherapyAppointmentDateAndTime::destroy($id);
            return redirect()->route('therapyAppointments.index')->with('error','Deleted successfully!');
        }
}
