<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\WalkByPatient;
use App\Models\DoctorAppointment;
use App\Models\TreatMentChart;
use App\Models\PatientTherapy;
class TreatMentChartController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


    public function index(){


        if (is_null($this->user) || !$this->user->can('treatMentChartView')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

          $treatMentChartList = TreatMentChart::latest()->get();



               return view('admin.treatMentChartList.index',compact('treatMentChartList'));
           }



           public function create(){
            if (is_null($this->user) || !$this->user->can('treatMentChartAdd')) {
                       abort(403, 'Sorry !! You are Unauthorized to Add !');
                   }
                   $walkByPatientList = WalkByPatient::latest()->get();
                   $patientList = Patient::latest()->get();
                   $doctorList = Doctor::latest()->get();
           //dd(1);
                   return view('admin.treatMentChartList.create',compact('doctorList','walkByPatientList','patientList'));
               }



               public function getTherapyInformation(Request $request){


                $registerId = $request->registerId;

                $getAllTheTherapy = PatientTherapy::where('patient_id',$registerId)->get();

                $data = view('admin.treatMentChartList.getTherapyInformation',compact('getAllTheTherapy'))->render();
                return response()->json($data);


               }



               public function store(Request $request){


                $request->validate([

                    'main_day.*' => 'required',
                    'patient_id.*' => 'required',
                    'time_of_the_day.*' => 'required',
                    'therapy_id.*' => 'required',

                ]);


               // dd($request->all());


                $inputAllData = $request->all();

            $patientId = $inputAllData['patient_id'];


              foreach($patientId as $key => $herbName){
                $herbName = new TreatMentChart();
                $herbName->patient_id=$inputAllData['patient_id'][$key];
                $herbName->therapy_id=$inputAllData['therapy_id'][$key];
                $herbName->patient_type=$request->patient_type;
                $herbName->day=$inputAllData['main_day'][$key];
                $herbName->time_of_the_day=$inputAllData['time_of_the_day'][$key];
                $herbName->save();

               }


               return redirect()->route('treatMentChart.index')->with('success','Added successfully!');



               }


               public function agreementFormOne(){

                return view('admin.agreementForm.agreementFormOne');
               }

               public function agreementFormTwo(){

                return view('admin.agreementForm.agreementFormTwo');
               }

               public function agreementFormThree(){

                return view('admin.agreementForm.agreementFormThree');
               }
}
