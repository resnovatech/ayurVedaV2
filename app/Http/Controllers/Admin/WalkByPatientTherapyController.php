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
use App\Models\SingleIngredient;
use App\Models\FacialPack;
use App\Models\FacialPackDetail;
use App\Models\OtherIngredient;
use App\Models\FacePack;
use App\Models\FacePackDetail;
use App\Models\FacePackAppoinment;
use App\Models\FacePackAppoinmentDetail;
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
    
    public function face_pack_delete($id){
        $therapyTypeOne = FacePackAppoinmentDetail::where('id',$id)->value('appoinment_id');
        $therapyTypeTwo = FacePackAppoinmentDetail::where('id',$id)->value('history_id');
        
        PatientHistory::where('id',$therapyTypeTwo)->delete();
        FacePackAppoinment::where('id',$therapyTypeOne)->delete();
        FacePackAppoinmentDetail::where('id',$id)->delete();
        
         return redirect()->back()->with('error','Deleted successfully!');
    }
    
    public function therapy_delete($id){
        
        $therapyType = TherapyAppointmentDetail::where('id',$id)->value('name');
        
     
        
        if($therapyType == 'Single'){
            
                    $therapyTypeOne = TherapyAppointmentDetail::where('id',$id)->value('therapy_appointment_id');
                       //dd($therapyTypeOne);
                       $therapyTypeTwo = TherapyAppointment::where('id',$therapyTypeOne)->value('history_id');
        
        PatientHistory::where('id',$therapyTypeTwo)->delete();
                    TherapyAppointment::where('id',$therapyTypeOne)->delete();
                   TherapyAppointmentDetail::where('id',$id)->delete();
                    return redirect()->back()->with('error','Deleted successfully!');
            
            
        }else{
              $therapyTypeOne = TherapyAppointmentDetail::where('id',$id)->delete();
            return redirect()->back()->with('error','Deleted successfully!');
        }
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

        }elseif($getMainVal== 'Face Pack'){
            $data = view('admin.walkByPatientTherapy.facePack',compact('getMainVal'))->render();
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
            Session::put('patientName', $request->name);

            Session::put('therapyPackageId',$request->therapy_package_id);


            $data = WalkByPatient::where('patient_reg_id','=',$patientId)->first();

            Session::put('name', $data->name);
            Session::put('age', $data->age);
            Session::put('email', $data->email_address);


            $getPreviousData = PatientHistory::where('patient_id',$patientId)
            ->where('status',2)->count();


            //session()->forget(['patientHistoryUpdateId']);

            //dd(Session::get('patientHistoryUpdateId'));

            if($getPreviousData > 0){

                $patientHistoryUpdateId =PatientHistory::where('patient_id',$patientId)
            ->where('status',2)->value('id');
Session::put('patientHistoryUpdateId', $patientHistoryUpdateId);
                //dd($patientHistoryUpdateId);
            }else{
                //dd(225);
           $patientHistoryUpdate = new PatientHistory();
           $patientHistoryUpdate->admin_id =Auth::guard('admin')->user()->id;
           $patientHistoryUpdate->patient_id =$patientId;
           $patientHistoryUpdate->status = 2;
           $patientHistoryUpdate->save();

           $patientHistoryUpdateId = $patientHistoryUpdate->id;

           Session::put('patientHistoryUpdateId', $patientHistoryUpdateId);

        }




            $appId = 0;

            if($request->therapy_type == 'Single'){


                $therapyAppointment = new TherapyAppointment();
                $therapyAppointment->admin_id =Auth::guard('admin')->user()->id;
                $therapyAppointment->patient_id =$patientId;
                $therapyAppointment->history_id = $patientHistoryUpdateId;
                $therapyAppointment->status = 0;
                $therapyAppointment->save();

                $therapyAppointmentId = $therapyAppointment->id;

                $inputAllData = $request->all();

                $therapyAppointmentDetail = $inputAllData['therapy_id'];
               // $therapistList = $inputAllData['therapist_id'];
                $therapyNameDetail = $inputAllData['therapy_id'];


                foreach($therapyAppointmentDetail as $key => $therapyAppointmentDetail){
                    $therapyAppointmentDetail = new TherapyAppointmentDetail();
                    $therapyAppointmentDetail->therapy_name=$inputAllData['therapy_id'][$key];
                    $therapyAppointmentDetail->name='Single';
                    $therapyAppointmentDetail->amount=1;
                    $therapyAppointmentDetail->therapy_appointment_id   = $therapyAppointmentId;
                    $therapyAppointmentDetail->save();

                  $appId = $therapyAppointmentDetail->id;




                   }

                   $color_image_main1 = $inputAllData["ingrident_id"];

                   foreach($color_image_main1 as $j => $therapyNamen){

                       $therapyNamen = new SingleIngredient();
                       $therapyNamen->ingredient_name=$inputAllData['ingrident_id'][$j];
                       $therapyNamen->quantity=$inputAllData['quantity'][$j];
                       $therapyNamen->unit=$inputAllData['unit'][$j];
                       $therapyNamen->therapy_appointment_detail_id   = $appId;
                       $therapyNamen->save();

                   }

            }elseif($request->therapy_type == 'Face Pack'){

                $inputAllData = $request->all();
                $getPreviousData = FacePackAppoinment::where('patient_id',$patientId)
                ->where('status',0)->count();

                $doctorAppointment = new FacePackAppoinment();
                $doctorAppointment->admin_id = Auth::guard('admin')->user()->id;
                $doctorAppointment->patient_id = $request->patient_id;
                $doctorAppointment->patient_type ='WalkByPatient';
                $doctorAppointment->status = 0;
                $doctorAppointment->save();

                // $therapyAppointment = new TherapyAppointment();
                // $therapyAppointment->admin_id =Auth::guard('admin')->user()->id;
                // $therapyAppointment->patient_id =$patientId;
                // $therapyAppointment->status = 0;
                // $therapyAppointment->save();

                // $therapyAppointmentId = $therapyAppointment->id;

                $facePackId = $doctorAppointment->id;

                $packId = $inputAllData['face_package_id'];


                if (array_key_exists("face_package_id", $inputAllData)){

                   foreach($packId as $key => $packId){
                    $therapyDetail= new FacePackAppoinmentDetail();
                    $therapyDetail->face_pack_id =$inputAllData['face_package_id'][$key];
                    $therapyDetail->appoinment_id   = $facePackId;
                    $therapyDetail->history_id   = $patientHistoryUpdateId;
                    $therapyDetail->quantity   = 1;
                    $therapyDetail->save();


                    // $therapyAppointmentDetail = new TherapyAppointmentDetail();
                    // $therapyAppointmentDetail->therapy_name=$inputAllData['face_package_id'][$key];
                    // $therapyAppointmentDetail->name='Single';
                    // $therapyAppointmentDetail->amount=1;
                    // $therapyAppointmentDetail->therapy_appointment_id   = $therapyAppointmentId;
                    // $therapyAppointmentDetail->save();



                   }
                   }

            }else{

                $therapyAppointment = new TherapyAppointment();
                $therapyAppointment->admin_id =Auth::guard('admin')->user()->id;
                $therapyAppointment->patient_id =$patientId;
                 $therapyAppointment->history_id = $patientHistoryUpdateId;
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
                $therapyAppointmentDetail->name=$request->therapy_package_id;
                $therapyAppointmentDetail->amount=1;
                $therapyAppointmentDetail->therapy_appointment_id   = $therapyAppointmentId;
                $therapyAppointmentDetail->save();

                $appIdNew = $therapyAppointmentDetail->id;

                $mm_id = TherapyAppointmentDetail::where('therapy_name',$inputAllData['therapy_id'][$key])
                ->where('therapy_appointment_id',$therapyAppointmentId)->value('id');


                $color_image_main45 = $inputAllData["ingrident_id".$key];

                foreach($color_image_main45 as $k => $therapyNamen33){

    //                 TherapyAppointmentDetail::where('id', $mm_id)
    //    ->update([
    //     'name'=>$inputAllData["ingrident_id".$key][$j],
    //        'amount' =>$inputAllData["quantity".$key][$j]
    //     ]);


    $therapyNamen33 = new SingleIngredient();
    $therapyNamen33->ingredient_name=$inputAllData['ingrident_id'.$key][$k];
    $therapyNamen33->quantity=$inputAllData['quantity'.$key][$k];
    $therapyNamen33->unit=$inputAllData['unit'.$key][$k];
    $therapyNamen33->therapy_appointment_detail_id   = $appIdNew;
    $therapyNamen33->save();

                }

               }
            }


               return redirect()->route('walkByPatientTherapy.create')->with('success','Added successfully!');



        }

        public function patientFinalSubmit(Request $request){

            $inputAllData = $request->all();


//dd(Session::get('patientId'));


        $therapyHistoryId =PatientHistory::where('patient_id',Session::get('patientId'))
                  ->where('status',2)
                   ->value('id');
                   
                  // dd(Session::get('patientHistoryUpdateId'));

        $therapyAppointmentId = DB::table('therapy_appointments')
                 ->where('patient_id',Session::get('patientId'))
                  ->where('status',0)
                   ->value('id');


                   $faceAppointmentId = DB::table('face_pack_appoinments')
                   ->where('patient_id',Session::get('patientId'))
                    ->where('status',0)
                     ->value('id');


             $therapistList = $inputAllData['therapist_id'];
            $therapyNameDetail = $inputAllData['therapy_id'];


            //Session::put('therapyPackageId', $request->therapy_package_id);

                foreach($therapyNameDetail as $key => $therapyNameDetail){


                $therapyName = new PatientMainTherapy();
                $therapyName->name=$inputAllData['therapy_id'][$key];
                $therapyName->therapist_id=$inputAllData['therapist_id'][$key];

                if($inputAllData['face_type'][$key] == 1){
                    $therapyName->face_pack_status=1;

                }else{
                    $therapyName->face_pack_status=0;
                    $therapyName->therapy_appointment_id=$therapyAppointmentId;
                }
                $therapyName->amount=1;
                $therapyName->therapy_package_id   =  Session::get('therapyPackageId');
                $therapyName->patient_history_id   = Session::get('patientHistoryUpdateId');
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
                if($inputAllData['face_type'][$key] == 1){
                    $therapistList->face_pack_status=1;
                    $therapistList->therapy_appointment_id   = $faceAppointmentId;
                }else{
                    $therapistList->face_pack_status=0;
                    $therapistList->therapy_appointment_id   = $therapyAppointmentId;
                }
                $therapistList->serial=$finalSerialValue;
                $therapistList->patient_id   = Session::get('patientId');
                $therapistList->admin_id   = Auth::guard('admin')->user()->id;

                $therapistList->save();

               }

               DB::table('therapy_appointments')->where('patient_id',Session::get('patientId'))
               ->where('status',0)
          ->update([
              'status' => 3
           ]);


           DB::table('face_pack_appoinments')->where('patient_id',Session::get('patientId'))
           ->where('status',0)
      ->update([
          'status' => 6
       ]);


       DB::table('patient_histories')->where('patient_id',Session::get('patientId'))
       ->where('status',2)
  ->update([
      'status' => 6
   ]);

           session()->forget(['name','age','email','therapyPackageId','patientHistoryUpdateId']);

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
