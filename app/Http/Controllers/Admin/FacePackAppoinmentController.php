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
use App\Models\FacialPack;
use App\Models\FacialPackDetail;
use App\Models\OtherIngredient;
use App\Models\FacePack;
use App\Models\FacePackDetail;
use App\Models\FacePackAppoinment;
use App\Models\FacePackAppoinmentDetail;
use App\Models\PatientHistory;
class FacePackAppoinmentController extends Controller
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


        if (is_null($this->user) || !$this->user->can('facePackAppoinmentView')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

          $doctorAppointmentList = FacePackAppoinment::latest()->get();



               return view('admin.facePackAppoinment.index',compact('doctorAppointmentList'));
           }

    public function create(){
        if (is_null($this->user) || !$this->user->can('facePackAppoinmentAdd')) {
                   abort(403, 'Sorry !! You are Unauthorized to Add !');
               }
               $walkByPatientList = WalkByPatient::latest()->get();
               $patientList = Patient::latest()->get();
               $doctorList = Doctor::latest()->get();
       //dd(1);
       $facialPackLists = FacePack::latest()->get();
               return view('admin.facePackAppoinment.create',compact('facialPackLists','doctorList','walkByPatientList','patientList'));
           }


           public function store(Request $request){


            if (is_null($this->user) || !$this->user->can('doctorAppointmentAdd')) {
                abort(403, 'Sorry !! You are Unauthorized to Add !');
            }

            //dd($request->all());

            $request->validate([
                'patient_id' => 'required',

            ]);





           $walkByPatientList = WalkByPatient::where('patient_reg_id',$request->patient_id)

           ->get();

           if(count($walkByPatientList) > 0){

               $data = 'WalkByPatient';
           }else{

            $data = 'Patient';

           }



             $doctorAppointment = new FacePackAppoinment();
             $doctorAppointment->admin_id = Auth::guard('admin')->user()->id;
             $doctorAppointment->patient_id = $request->patient_id;
             $doctorAppointment->patient_type = $data;
             $doctorAppointment->status = '';
             $doctorAppointment->save();

             $facePackId = $doctorAppointment->id;


             $doctorAppointment2 = new PatientHistory();
             $doctorAppointment2->admin_id = Auth::guard('admin')->user()->id;
             $doctorAppointment2->patient_id = $request->patient_id;
             $doctorAppointment2->save();

             $historyId = $doctorAppointment2->id;



             $inputAllData = $request->all();

             $packId = $inputAllData['pack_id'];


             if (array_key_exists("pack_id", $inputAllData)){

                foreach($packId as $key => $packId){
                 $therapyDetail= new FacePackAppoinmentDetail();
                 $therapyDetail->face_pack_id =$inputAllData['pack_id'][$key];
                 $therapyDetail->appoinment_id   = $facePackId;
                 $therapyDetail->history_id   = $historyId;
                 $therapyDetail->quantity   = 1;
                 $therapyDetail->save();

                }
                }





             return redirect()->route('facePackAppoinment.index')->with('success','Added successfully!');


        }


        public function destroy($id)
    {

        if (is_null($this->user) || !$this->user->can('facePackAppoinmentDelete')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete !');
        }


        FacePackAppoinment::destroy($id);
        return redirect()->route('facePackAppoinment.index')->with('error','Deleted successfully!');
    }
}
