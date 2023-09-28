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
               $therapyAppointmentDateAndTimeListAll = TherapyAppointmentDateAndTime::latest()->get();
       //dd(1);
               return view('admin.walkByPatientTherapy.index',compact('therapyAppointmentDateAndTimeList','therapyAppointmentDateAndTimeListAll'));
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


            // $therapistList = $inputAllData['therapist_id'];
           
            
            
           // dd($therapyNameDetail);
//dd( $inputAllData);


  if (array_key_exists("face_type", $inputAllData)){
      
      $faceTypeList = $inputAllData['face_type'];
      
      
         foreach($faceTypeList as $i=>$AllFaceTypeList){
                
                
              
                    
                    //dd($AllfaceTypeList[$i]);
                    
                    
                     $therapyNameDetail = $inputAllData['therapy_id'][4000+$i];
                     
                     //dd($therapyNameDetail);
                     //main list
                     foreach($therapyNameDetail as $j=>$AllTherapyNameDetail){
                         
                         $var = 4000+$j;
                          $therapistNameDetail = $inputAllData['therapist_id'.$var][4000+$j];
                          $convertInString =  $tags = implode(', ',$therapistNameDetail);
                          
                          //dd($convertInString);
                          
                          //fistInsert
                          
                          
                            $therapyName = new PatientMainTherapy();
                $therapyName->name=$AllTherapyNameDetail;
                $therapyName->therapist_id=$convertInString;
                $therapyName->face_pack_status=1;
                $therapyName->amount=1;
                $therapyName->therapy_package_id   =  Session::get('therapyPackageId');
                $therapyName->patient_history_id   = Session::get('patientHistoryUpdateId');
                $therapyName->patient_id   = Session::get('patientId');
                $therapyName->save();
                          
                          
                          
                          
                          //endFirstInsert
                          
                          //set Appoinment Detail
                          
                          
                foreach($therapistNameDetail as $k => $AllTherapistNameDetail){
                    
                    
                //array to string
                
                
                          $convertInStringDate = implode(', ',$inputAllData['date'][4000+$j]);
                           $convertInStringStart = implode(', ',$inputAllData['start_time'][4000+$j]);
                            $convertInStringEnd = implode(', ',$inputAllData['end_time'][4000+$j]);
                
               //dd($convertInStringStart.'-'.$convertInStringEnd );
                //end array to string
                    
                   // dd(11);

                $getSerialValue =  TherapyAppointmentDateAndTime::where('therapist',$AllTherapistNameDetail)
                ->where('therapy',$AllTherapyNameDetail)
                ->where('date',$convertInStringDate)
                ->value('serial');

                if(empty($getSerialValue)){


                 $finalSerialValue = 1;

                }else{
                 $finalSerialValue = $getSerialValue + 1;

                }
                

 



                $therapistList1 = new TherapyAppointmentDateAndTime();
                $therapistList1->therapist=$AllTherapistNameDetail;
                $therapistList1->therapy=$AllTherapyNameDetail;
                $therapistList1->date=$convertInStringDate;
                $therapistList1->start_time= $convertInStringStart;
                $therapistList1->end_time= $convertInStringEnd;
                $therapistList1->face_pack_status=1;
                $therapistList1->therapy_appointment_id   = $faceAppointmentId;
            
                $therapistList1->serial=$finalSerialValue;
                $therapistList1->patient_id   = Session::get('patientId');
                $therapistList1->admin_id   = Auth::guard('admin')->user()->id;
  // dd($inputAllData['end_time'][4000+$i]);
                $therapistList1->save();

               }
                          
                          
                          //end Appoinment Detail
                         
                         
                         
                     }
                     
                     //end main list
                    
                    
                    
                
                
                
                
            }
      
  }
  
  
   if (array_key_exists("face_type_t", $inputAllData)){
       
       $therapyTypeList = $inputAllData['face_type_t'];
       
       
          foreach($therapyTypeList as $i=>$AllFaceTypeList){
                
                
              
                    
                    
                     //dd($AllFaceTypeList); 
                      
                       $therapyNameDetail = $inputAllData['therapy_id_t'][$i];
                       
                           foreach($therapyNameDetail as $j=>$AllTherapyNameDetail){
                         
                         $var = $j;
                          $therapistNameDetail = $inputAllData['therapist_id_t'.$var][$j];
                          $convertInString =  $tags = implode(', ',$therapistNameDetail);
                          
                          
                            //fistInsert
                          
                          
                            $therapyName = new PatientMainTherapy();
                $therapyName->name=$AllTherapyNameDetail[$j];
                $therapyName->therapist_id=$convertInString;
                  $therapyName->face_pack_status=0;
                    $therapyName->therapy_appointment_id=$therapyAppointmentId;
                $therapyName->amount=1;
                $therapyName->therapy_package_id   =  Session::get('therapyPackageId');
                $therapyName->patient_history_id   = Session::get('patientHistoryUpdateId');
                $therapyName->patient_id   = Session::get('patientId');
                $therapyName->save();
                          
                          
                          
                          
                          //endFirstInsert
                          
                          
                               //set Appoinment Detail
                          
                          
                foreach($therapistNameDetail as $k => $AllTherapistNameDetail){
                    
                    
                //array to string
                
                
                          $convertInStringDate = implode(', ',$inputAllData['date_t'][$j]);
                           $convertInStringStart = implode(', ',$inputAllData['start_time_t'][$j]);
                            $convertInStringEnd = implode(', ',$inputAllData['end_time_t'][$j]);
                
               // dd($convertInStringDate );
                //end array to string

                $getSerialValue =  TherapyAppointmentDateAndTime::where('therapist',$AllTherapistNameDetail)
                ->where('therapy',$AllTherapyNameDetail[$j])
                ->where('date',$convertInStringDate)
                ->value('serial');

                if(empty($getSerialValue)){


                 $finalSerialValue = 1;

                }else{
                 $finalSerialValue = $getSerialValue + 1;

                }





                $therapistList = new TherapyAppointmentDateAndTime();
                $therapistList->therapist=$AllTherapistNameDetail;
                $therapistList->therapy=$AllTherapyNameDetail[$j];
                     $therapistList->date=$convertInStringDate;
                $therapistList->start_time= $convertInStringStart;
                $therapistList->end_time= $convertInStringEnd;
                  $therapistList->face_pack_status=0;
                    $therapistList->therapy_appointment_id   = $therapyAppointmentId;
              
                $therapistList->serial=$finalSerialValue;
                $therapistList->patient_id   = Session::get('patientId');
                $therapistList->admin_id   = Auth::guard('admin')->user()->id;

                $therapistList->save();

               }
                          
                          
                          //end Appoinment Detail
                          
                          
                           }
                    
                    
                    
           
                
                
                
            }
      
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
