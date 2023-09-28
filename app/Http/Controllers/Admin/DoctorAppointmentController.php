<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\WalkByPatient;
use App\Models\DoctorAppointment;
class DoctorAppointmentController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


    public function searchPatientForAppoinmentInfo(request $request){


        $walkByPatientList = WalkByPatient::select("name as value",DB::raw("CONCAT(name,' - ',phone_or_mobile_number) as label"),"patient_reg_id as patient_reg_id", "age","email_address as email")
        ->where('patient_reg_id', 'LIKE', '%'. $request->get('search'). '%')
        ->orwhere('name', 'LIKE', '%'. $request->get('search'). '%')
        ->orwhere('phone_or_mobile_number', 'LIKE', '%'. $request->get('search'). '%')
        ->get();

        if(count($walkByPatientList) > 0){

            $data = WalkByPatient::select("name as value",DB::raw("CONCAT(name,' - ',phone_or_mobile_number) as label"),"patient_reg_id as patient_reg_id", "age","email_address as email")
            ->where('patient_reg_id', 'LIKE', '%'. $request->get('search'). '%')
            ->orwhere('name', 'LIKE', '%'. $request->get('search'). '%')
            ->orwhere('phone_or_mobile_number', 'LIKE', '%'. $request->get('search'). '%')
            ->get();
        }else{






            $data = Patient::select("name as value",DB::raw("CONCAT(name,' - ',phone_or_mobile_number) as label"),"patient_id as patient_reg_id", "age","email_address as email")
            ->where('patient_id', 'LIKE', '%'. $request->get('search'). '%')
            ->orwhere('name', 'LIKE', '%'. $request->get('search'). '%')
            ->orwhere('phone_or_mobile_number', 'LIKE', '%'. $request->get('search'). '%')
            ->get();

        }










return response()->json($data);
    }



    public function index(){


        if (is_null($this->user) || !$this->user->can('doctorAppointmentView')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }
//dd(date('Y-m-d'));
          $doctorAppointmentList = DoctorAppointment::where('appointment_date',date('Y-m-d'))->latest()->get();



               return view('admin.doctorAppointment.index',compact('doctorAppointmentList'));
           }


    public function create(){
 if (is_null($this->user) || !$this->user->can('doctorAppointmentAdd')) {
            abort(403, 'Sorry !! You are Unauthorized to Add !');
        }
        $walkByPatientList = WalkByPatient::latest()->get();
        $patientList = Patient::latest()->get();
        $doctorList = Doctor::latest()->get();
//dd(1);
        return view('admin.doctorAppointment.create',compact('doctorList','walkByPatientList','patientList'));
    }



    public function edit($id)
    {

        if (is_null($this->user) || !$this->user->can('doctorAppointmentUpdate')) {
            abort(403, 'Sorry !! You are Unauthorized to Edit !');
        }


        $doctorAppointmentList = DoctorAppointment::find($id);
        $walkByPatientList = WalkByPatient::latest()->get();
        $patientList = Patient::latest()->get();
        $doctorList = Doctor::latest()->get();

        if($doctorAppointmentList->patient_type == 'Patient'){

            $patientListInfo = Patient::where('patient_id',$doctorAppointmentList->patient_id)->first();

        }else{

            $patientListInfo = WalkByPatient::where('patient_reg_id',$doctorAppointmentList->patient_id)->first();

        }
        return view('admin.doctorAppointment.edit',compact('patientListInfo','patientList','doctorAppointmentList','doctorList','walkByPatientList'));
    }



    public function destroy($id)
    {

        if (is_null($this->user) || !$this->user->can('doctorAppointmentDelete')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete !');
        }


        DoctorAppointment::destroy($id);
        return redirect()->route('doctorAppointments.index')->with('error','Deleted successfully!');
    }


    public function store(Request $request){


        if (is_null($this->user) || !$this->user->can('doctorAppointmentAdd')) {
            abort(403, 'Sorry !! You are Unauthorized to Add !');
        }

        //dd($request->all());

        $request->validate([
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'appointment_date' => 'required',

        ]);


       $getSerialValue =  DoctorAppointment::where('appointment_date',$request->appointment_date)
       ->where('doctor_id',$request->doctor_id)
       ->value('serial_number');

       if(empty($getSerialValue)){


        $finalSerialValue = 1;

       }else{
        $finalSerialValue = $getSerialValue + 1;

       }


       $walkByPatientList = WalkByPatient::where('patient_reg_id',$request->patient_id)

       ->get();

       if(count($walkByPatientList) > 0){

           $data = 'WalkByPatient';
       }else{

        $data = 'Patient';

       }



         $doctorAppointment = new DoctorAppointment();
         $doctorAppointment->admin_id = Auth::guard('admin')->user()->id;
         $doctorAppointment->patient_id = $request->patient_id;
         $doctorAppointment->doctor_id = $request->doctor_id;
         $doctorAppointment->appointment_date = $request->appointment_date;
         $doctorAppointment->appointment_time = $request->appointment_time;
         $doctorAppointment->patient_type = $data;
         $doctorAppointment->serial_number = $finalSerialValue;
         $doctorAppointment->save();



         return redirect()->route('doctorAppointments.index')->with('success','Added successfully!');


    }


    public function update(Request $request,$id){


        if (is_null($this->user) || !$this->user->can('doctorAppointmentAdd')) {
            abort(403, 'Sorry !! You are Unauthorized to Add !');
        }



        $walkByPatientList = WalkByPatient::where('patient_reg_id',$request->patient_id)

        ->get();

        if(count($walkByPatientList) > 0){

            $data = 'WalkByPatient';
        }else{

         $data = 'Patient';

        }

         $doctorAppointment = DoctorAppointment::find($id);
         $doctorAppointment->patient_id = $request->patient_id;
         $doctorAppointment->doctor_id = $request->doctor_id;
         $doctorAppointment->appointment_date = $request->appointment_date;
         $doctorAppointment->appointment_time = $request->appointment_time;
         $doctorAppointment->patient_type = $data;
         $doctorAppointment->save();



         return redirect()->route('doctorAppointments.index')->with('success','Updated successfully!');


    }


    public function show($id){

    }


    public function checkAppoinmentInfo(Request $request){

        $getTheValue = $request->getTheValue;
         $mainDate = $request->mainDate;
         $mainDocId = $request->mainDocId;


         $data = DoctorAppointment::where('doctor_id',$mainDocId)
         ->where('appointment_date',$mainDate)
         ->where('appointment_time',$getTheValue)->count();

         return $data;

    }



}
