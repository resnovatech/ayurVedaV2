<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AgrementFormOne;
use App\Models\WalkByPatient;
use App\Models\Patient;
use App\Models\PatientAdmit;
use App\Models\AgrementFormOneSnehaList;
use App\Models\VamanYogaList;
use Illuminate\Support\Facades\Auth;
class AgrementFormOneController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


    public function searchPatientFromVamanKarma(Request $request)
    {

        $checkValueAvailableOrNot = Patient::where('patient_id', 'LIKE', '%'. $request->get('search'). '%')
        ->orwhere('name', 'LIKE', '%'. $request->get('search'). '%')
        ->orwhere('phone_or_mobile_number', 'LIKE', '%'. $request->get('search'). '%')
        ->value('name');


        if(empty($checkValueAvailableOrNot)){

            $data = PatientAdmit::select("name as value","patient_id as label", "age",'gender')
            ->where('patient_id', 'LIKE', '%'. $request->get('search'). '%')
            ->orwhere('name', 'LIKE', '%'. $request->get('search'). '%')
            ->orwhere('phone_or_mobile_number', 'LIKE', '%'. $request->get('search'). '%')
            ->get();

        }else{


            $data = Patient::select("name as value","patient_id as label", "age",'gender')
          ->where('patient_id', 'LIKE', '%'. $request->get('search'). '%')
          ->orwhere('name', 'LIKE', '%'. $request->get('search'). '%')
          ->orwhere('phone_or_mobile_number', 'LIKE', '%'. $request->get('search'). '%')
          ->get();

        }








return response()->json($data);





    }

    public function index(){


        if (is_null($this->user) || !$this->user->can('agreementFormOneView')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }


    $agrementFormOneList = AgrementFormOne::latest()->get();

    return view('admin.agrementFormOne.index',compact('agrementFormOneList'));
           }


    public function create(){

if (is_null($this->user) || !$this->user->can('agreementFormOneAdd')) {
                abort(403, 'Sorry !! You are Unauthorized to View !');
                   }


                   $walkByPatientList = WalkByPatient::latest()->get();
                   $patientList = Patient::latest()->get();
                   return view('admin.agrementFormOne.create',compact('walkByPatientList','patientList'));

               }


               public function edit($id){


                if (is_null($this->user) || !$this->user->can('agreementFormOneUpdate')) {
                    abort(403, 'Sorry !! You are Unauthorized to View !');
                       }

                       $agrementFormOneList = AgrementFormOne::find($id);
                       $walkByPatientList = WalkByPatient::latest()->get();
                       $patientList = Patient::latest()->get();
                       return view('admin.agrementFormOne.edit',compact('agrementFormOneList','walkByPatientList','patientList'));


                   }



                   public function view($id){


                    if (is_null($this->user) || !$this->user->can('agreementFormOneView')) {
                        abort(403, 'Sorry !! You are Unauthorized to View !');
                           }


                       }


                       public function print($id){


                        if (is_null($this->user) || !$this->user->can('agreementFormOneView')) {
                            abort(403, 'Sorry !! You are Unauthorized to View !');
                               }


                           }

                       public function store(Request $request){


                        if (is_null($this->user) || !$this->user->can('agreementFormOneAdd')) {
                            abort(403, 'Sorry !! You are Unauthorized to View !');
                               }

                    //dd($request->all());


                    $request->validate([

                        'name' => 'required',
                        'opd_no' => 'required',
                        'age' => 'required',
                        'gender' => 'required',
                        'diagnosis' => 'required',
                        'physician' => 'required',
                        'dos' => 'required',
                        'doc' => 'required',
                        'poorv_karma' => 'required',
                        'snehpanam' => 'required',
                        'diet_on_day_before' => 'required',
                        'pradhan_karma' => 'required',
                        'blood_pressure' => 'required',
                        'nadi' => 'required',
                        'samyak_lakshana_vegaki' => 'required',
                        'samyak_lakshana_manaki' => 'required',
                        'samyak_lakshana_laingaki' => 'required',
                        'laingaki' => 'required',
                        'type_of_shodhanam' => 'required',
                        'samsarjana_krama' => 'required',
                        'name_of_vaman_yog.*' => 'required',
                        'vaman_yog_time.*' => 'required',
                        'vaman_yog_quantity.*' => 'required',
                        'name_of_sneha.*' => 'required',
                        'day_one.*' => 'required',
                        'day_two.*' => 'required',
                        'day_three.*' => 'required',
                        'day_four.*' => 'required',
                        'day_five.*' => 'required',
                        'day_six.*' => 'required',
                        'day_seven.*' => 'required',
                        'remark.*' => 'required',
                    ]);




                    $vamanKarma = new AgrementFormOne();
                    $vamanKarma->admin_id = Auth::guard('admin')->user()->id;
                    $vamanKarma->name = $request->name;
                    $vamanKarma->opd_no = $request->opd_no;
                    $vamanKarma->age = $request->age;
                    $vamanKarma->gender = $request->gender;
                    $vamanKarma->diagnosis = $request->diagnosis;
                    $vamanKarma->physician = $request->physician;
                    $vamanKarma->dos = $request->dos;
                    $vamanKarma->doc = $request->doc;
                    $vamanKarma->poorv_karma = $request->poorv_karma;
                    $vamanKarma->snehpanam = $request->snehpanam;
                    $vamanKarma->pradhan_karma = $request->pradhan_karma;
                    $vamanKarma->blood_pressure = $request->blood_pressure;
                    $vamanKarma->nadi = $request->nadi;
                    $vamanKarma->samyak_lakshana_vegaki = $request->samyak_lakshana_vegaki;
                    $vamanKarma->samyak_lakshana_manaki = $request->samyak_lakshana_manaki;
                    $vamanKarma->samyak_lakshana_laingaki = $request->samyak_lakshana_laingaki;
                    $vamanKarma->laingaki = $request->laingaki;
                    $vamanKarma->type_of_shodhanam = $request->type_of_shodhanam;
                    $vamanKarma->samsarjana_krama = $request->samsarjana_krama;
                    $vamanKarma->diet_on_day_before = $request->diet_on_day_before;
                    $vamanKarma->save();


                    $vamanKarmaId = $vamanKarma->id;


                    $inputAllData = $request->all();

                    $snehaList = $inputAllData['name_of_sneha'];
                    $vamanYogaList = $inputAllData['name_of_vaman_yog'];


                    foreach($snehaList as $key => $allSnehaList){
                        $allSnehaList = new AgrementFormOneSnehaList();
                        $allSnehaList->sneha_name=$inputAllData['name_of_sneha'][$key];
                        $allSnehaList->day_one=$inputAllData['day_one'][$key];
                        $allSnehaList->day_two=$inputAllData['day_two'][$key];
                        $allSnehaList->day_three=$inputAllData['day_three'][$key];
                        $allSnehaList->day_four=$inputAllData['day_four'][$key];
                        $allSnehaList->day_five=$inputAllData['day_five'][$key];
                        $allSnehaList->day_six=$inputAllData['day_six'][$key];
                        $allSnehaList->day_seven=$inputAllData['day_seven'][$key];
                        $allSnehaList->remark=$inputAllData['remark'][$key];
                        $allSnehaList->agrement_form_one_id  = $vamanKarmaId;
                        $allSnehaList->save();

                       }


                       foreach($vamanYogaList as $key => $allVamanYogaList){
                        $allVamanYogaList = new VamanYogaList();
                        $allVamanYogaList->yoga_name=$inputAllData['name_of_vaman_yog'][$key];
                        $allVamanYogaList->time=$inputAllData['vaman_yog_time'][$key];
                        $allVamanYogaList->quantity=$inputAllData['vaman_yog_quantity'][$key];
                        $allVamanYogaList->agrement_form_one_id  = $vamanKarmaId;
                        $allVamanYogaList->save();

                       }

                       return redirect()->route('agreementFormOne.index')->with('success','Added successfully!');
                           }


                           public function update(Request $request,$id){


                            if (is_null($this->user) || !$this->user->can('agreementFormOneUpdate')) {
                                abort(403, 'Sorry !! You are Unauthorized to View !');
                                   }




                                   $vamanKarma = AgrementFormOne::find($id);
                                   $vamanKarma->admin_id = Auth::guard('admin')->user()->id;
                                   $vamanKarma->name = $request->name;
                                   $vamanKarma->opd_no = $request->opd_no;
                                   $vamanKarma->age = $request->age;
                                   $vamanKarma->gender = $request->gender;
                                   $vamanKarma->diagnosis = $request->diagnosis;
                                   $vamanKarma->physician = $request->physician;
                                   $vamanKarma->dos = $request->dos;
                                   $vamanKarma->doc = $request->doc;
                                   $vamanKarma->poorv_karma = $request->poorv_karma;
                                   $vamanKarma->snehpanam = $request->snehpanam;
                                   $vamanKarma->pradhan_karma = $request->pradhan_karma;
                                   $vamanKarma->blood_pressure = $request->blood_pressure;
                                   $vamanKarma->nadi = $request->nadi;
                                   $vamanKarma->samyak_lakshana_vegaki = $request->samyak_lakshana_vegaki;
                                   $vamanKarma->samyak_lakshana_manaki = $request->samyak_lakshana_manaki;
                                   $vamanKarma->samyak_lakshana_laingaki = $request->samyak_lakshana_laingaki;
                                   $vamanKarma->laingaki = $request->laingaki;
                                   $vamanKarma->type_of_shodhanam = $request->type_of_shodhanam;
                                   $vamanKarma->samsarjana_krama = $request->samsarjana_krama;
                                   $vamanKarma->diet_on_day_before = $request->diet_on_day_before;
                                   $vamanKarma->save();


                                   $vamanKarmaId = $vamanKarma->id;


                                   $inputAllData = $request->all();

                                   $snehaList = $inputAllData['name_of_sneha'];
                                   $vamanYogaList = $inputAllData['name_of_vaman_yog'];

                                   $deletePartTwo =AgrementFormOneSnehaList::where('agrement_form_one_id',$id)->delete();

                                   $deletePartThree =VamanYogaList::where('agrement_form_one_id',$id)->delete();


                                   foreach($snehaList as $key => $allSnehaList){
                                       $allSnehaList = new AgrementFormOneSnehaList();
                                       $allSnehaList->sneha_name=$inputAllData['name_of_sneha'][$key];
                                       $allSnehaList->day_one=$inputAllData['day_one'][$key];
                                       $allSnehaList->day_two=$inputAllData['day_two'][$key];
                                       $allSnehaList->day_three=$inputAllData['day_three'][$key];
                                       $allSnehaList->day_four=$inputAllData['day_four'][$key];
                                       $allSnehaList->day_five=$inputAllData['day_five'][$key];
                                       $allSnehaList->day_six=$inputAllData['day_six'][$key];
                                       $allSnehaList->day_seven=$inputAllData['day_seven'][$key];
                                       $allSnehaList->remark=$inputAllData['remark'][$key];
                                       $allSnehaList->agrement_form_one_id  = $vamanKarmaId;
                                       $allSnehaList->save();

                                      }


                                      foreach($vamanYogaList as $key => $allVamanYogaList){
                                       $allVamanYogaList = new VamanYogaList();
                                       $allVamanYogaList->yoga_name=$inputAllData['name_of_vaman_yog'][$key];
                                       $allVamanYogaList->time=$inputAllData['vaman_yog_time'][$key];
                                       $allVamanYogaList->quantity=$inputAllData['vaman_yog_quantity'][$key];
                                       $allVamanYogaList->agrement_form_one_id  = $vamanKarmaId;
                                       $allVamanYogaList->save();

                                      }

                                      return redirect()->route('agreementFormOne.index')->with('info','Updated successfully!');


                               }


                               public function destroy($id){


                                if (is_null($this->user) || !$this->user->can('agreementFormOneDelete')) {
                                    abort(403, 'Sorry !! You are Unauthorized to View !');
                                       }


                                       $admins = AgrementFormOne::where('id',$id)->delete();


                            $deletePartTwo =AgrementFormOneSnehaList::where('agrement_form_one_id',$id)->delete();

                            $deletePartThree =VamanYogaList::where('agrement_form_one_id',$id)->delete();



                                       return back()->with('error','Deleted successfully!');


                                   }
}
