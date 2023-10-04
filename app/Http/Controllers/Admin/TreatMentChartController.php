<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Therapist;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\WalkByPatient;
use App\Models\DoctorAppointment;
use App\Models\TreatMentChart;
use App\Models\PatientTherapy;
use App\Models\FacePackAppoinmentDetail;
use App\Models\PatientHerb;
use App\Models\PatientMedicalSupplement;
use App\Models\PatientHistory;
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


                $lastPatientHistoryId  = PatientHistory::orderBy('id','desc')
                ->where('patient_id',$registerId)->value('id');

                $getAllTheTherapy = PatientTherapy::where('patient_history_id',$lastPatientHistoryId)->get();
                $getAllFacePack = FacePackAppoinmentDetail::where('history_id',$lastPatientHistoryId)->get();
                $getAllPatientHerb = PatientHerb::where('patient_history_id',$lastPatientHistoryId)->get();
                $getAllPatientMedicalSupplement = PatientMedicalSupplement::where('patient_history_id',$lastPatientHistoryId)->get();

                $therapistList = Therapist::latest()->get();
                $data = view('admin.treatMentChartList.getTherapyInformation',compact('registerId','therapistList','getAllPatientMedicalSupplement','getAllPatientHerb','getAllFacePack','getAllTheTherapy'))->render();
                return response()->json($data);


               }



               public function store(Request $request){


                // $request->validate([


                //     'patient_id.*' => 'required',
                //     'time_of_the_day.*' => 'required',
                //     'therapy_id.*' => 'required',

                // ]);


                //dd($request->all());


                $inputAllData = $request->all();

            $patientId = $inputAllData['patient_id'];


              foreach($patientId as $key => $herbName){
                $herbName = new TreatMentChart();
                $herbName->patient_id=$inputAllData['patient_id'][$key];
                $herbName->therapy_id=$inputAllData['therapy_id'][$key];
                $herbName->appointment_date=$inputAllData['appointment_date'][$key];
                $herbName->patient_type=$request->patient_type;
                $herbName->therapist=$inputAllData['therapist'][$key];
                $herbName->time_of_the_day=$inputAllData['time_of_the_day'][$key];
                $herbName->status=$inputAllData['status'][$key];
                $herbName->save();

               }


               return redirect()->route('treatMentChart.index')->with('success','Added successfully!');



               }



               public function destroy($id)
               {

                //    if (is_null($this->user) || !$this->user->can('therapyListsDelete')) {
                //        abort(403, 'Sorry !! You are Unauthorized to Delete !');
                //    }


                TreatMentChart::destroy($id);
                   return redirect()->route('treatMentChart.index')->with('error','Deleted successfully!');
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
