<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AgrementFormThree;
use App\Models\AgrementFormThreeSnehaList;
use App\Models\WalkByPatient;
use App\Models\Patient;
use App\Models\PatientAdmit;
use Illuminate\Support\Facades\Auth;
class AgrementFormThreeController extends Controller
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


        if (is_null($this->user) || !$this->user->can('agreementFormThreeView')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }


    $agrementFormThreeList = AgrementFormThree::latest()->get();

    return view('admin.agrementFormThree.index',compact('agrementFormThreeList'));
           }


    public function create(){

if (is_null($this->user) || !$this->user->can('agreementFormThreeAdd')) {
                abort(403, 'Sorry !! You are Unauthorized to View !');
                   }


                   $walkByPatientList = WalkByPatient::latest()->get();
                   $patientList = Patient::latest()->get();
                   return view('admin.agrementFormThree.create',compact('walkByPatientList','patientList'));

               }


               public function edit($id){


                if (is_null($this->user) || !$this->user->can('agreementFormThreeUpdate')) {
                    abort(403, 'Sorry !! You are Unauthorized to View !');
                       }

                       $agrementFormThreeList = AgrementFormThree::find($id);
                       $walkByPatientList = WalkByPatient::latest()->get();
                   $patientList = Patient::latest()->get();
                   return view('admin.agrementFormThree.edit',compact('agrementFormThreeList','walkByPatientList','patientList'));


                   }



                   public function view($id){


                    if (is_null($this->user) || !$this->user->can('agreementFormThreeView')) {
                        abort(403, 'Sorry !! You are Unauthorized to View !');
                           }


                       }


                       public function print($id){


                        if (is_null($this->user) || !$this->user->can('agreementFormThreeView')) {
                            abort(403, 'Sorry !! You are Unauthorized to View !');
                               }


                           }

                       public function store(Request $request){


                        if (is_null($this->user) || !$this->user->can('agreementFormThreeAdd')) {
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
                                'virechan_yog' => 'required',
                                'type_of_shodhanam' => 'required',
                                'samsarjana_krama' => 'required',
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



                            $virechanKarma = new AgrementFormThree();
                            $virechanKarma->admin_id = Auth::guard('admin')->user()->id;
                            $virechanKarma->name = $request->name;
                            $virechanKarma->opd_no = $request->opd_no;
                            $virechanKarma->age = $request->age;
                            $virechanKarma->gender = $request->gender;
                            $virechanKarma->diagnosis = $request->diagnosis;
                            $virechanKarma->physician = $request->physician;
                            $virechanKarma->dos = $request->dos;
                            $virechanKarma->doc = $request->doc;
                            $virechanKarma->poorv_karma = $request->poorv_karma;
                            $virechanKarma->snehpanam = $request->snehpanam;
                            $virechanKarma->pradhan_karma = $request->pradhan_karma;
                            $virechanKarma->blood_pressure = $request->blood_pressure;
                            $virechanKarma->nadi = $request->nadi;
                            $virechanKarma->virechan_yog = $request->virechan_yog;
                            $virechanKarma->samyak_lakshana_vegaki = $request->samyak_lakshana_vegaki;
                            $virechanKarma->samyak_lakshana_manaki = $request->samyak_lakshana_manaki;
                            $virechanKarma->samyak_lakshana_laingaki = $request->samyak_lakshana_laingaki;
                            $virechanKarma->laingaki = $request->laingaki;
                            $virechanKarma->type_of_shodhanam = $request->type_of_shodhanam;
                            $virechanKarma->samsarjana_krama = $request->samsarjana_krama;
                            $virechanKarma->diet_on_day_before = $request->diet_on_day_before;
                            $virechanKarma->save();


                            $virechanKarmaId = $virechanKarma->id;


                            $inputAllData = $request->all();

                            $snehaList = $inputAllData['name_of_sneha'];


                            foreach($snehaList as $key => $allSnehaList){
                                $allSnehaList = new AgrementFormThreeSnehaList();
                                $allSnehaList->sneha_name=$inputAllData['name_of_sneha'][$key];
                                $allSnehaList->day_one=$inputAllData['day_one'][$key];
                                $allSnehaList->day_two=$inputAllData['day_two'][$key];
                                $allSnehaList->day_three=$inputAllData['day_three'][$key];
                                $allSnehaList->day_four=$inputAllData['day_four'][$key];
                                $allSnehaList->day_five=$inputAllData['day_five'][$key];
                                $allSnehaList->day_six=$inputAllData['day_six'][$key];
                                $allSnehaList->day_seven=$inputAllData['day_seven'][$key];
                                $allSnehaList->remark=$inputAllData['remark'][$key];
                                $allSnehaList->agrement_form_three_id  = $virechanKarmaId;
                                $allSnehaList->save();

                               }




                               return redirect()->route('agreementFormThree.index')->with('success','Added successfully!');


                           }


                           public function update(Request $request,$id){


                            if (is_null($this->user) || !$this->user->can('agreementFormThreeUpdate')) {
                                abort(403, 'Sorry !! You are Unauthorized to View !');
                                   }

                                   //dd($id);

                            $virechanKarma = AgrementFormThree::find($id);
                            $virechanKarma->admin_id = Auth::guard('admin')->user()->id;
                            $virechanKarma->name = $request->name;
                            $virechanKarma->opd_no = $request->opd_no;
                            $virechanKarma->age = $request->age;
                            $virechanKarma->gender = $request->gender;
                            $virechanKarma->diagnosis = $request->diagnosis;
                            $virechanKarma->physician = $request->physician;
                            $virechanKarma->dos = $request->dos;
                            $virechanKarma->doc = $request->doc;
                            $virechanKarma->poorv_karma = $request->poorv_karma;
                            $virechanKarma->snehpanam = $request->snehpanam;
                            $virechanKarma->pradhan_karma = $request->pradhan_karma;
                            $virechanKarma->blood_pressure = $request->blood_pressure;
                            $virechanKarma->nadi = $request->nadi;
                            $virechanKarma->virechan_yog = $request->virechan_yog;
                            $virechanKarma->samyak_lakshana_vegaki = $request->samyak_lakshana_vegaki;
                            $virechanKarma->samyak_lakshana_manaki = $request->samyak_lakshana_manaki;
                            $virechanKarma->samyak_lakshana_laingaki = $request->samyak_lakshana_laingaki;
                            $virechanKarma->laingaki = $request->laingaki;
                            $virechanKarma->type_of_shodhanam = $request->type_of_shodhanam;
                            $virechanKarma->samsarjana_krama = $request->samsarjana_krama;
                            $virechanKarma->diet_on_day_before = $request->diet_on_day_before;
                            $virechanKarma->save();


                            $virechanKarmaId = $virechanKarma->id;


                            $inputAllData = $request->all();

                            $snehaList = $inputAllData['name_of_sneha'];
                            $deletePartTwo =AgrementFormThreeSnehaList::where('agrement_form_three_id',$id)->delete();

                            foreach($snehaList as $key => $allSnehaList){
                                $allSnehaList = new AgrementFormThreeSnehaList();
                                $allSnehaList->sneha_name=$inputAllData['name_of_sneha'][$key];
                                $allSnehaList->day_one=$inputAllData['day_one'][$key];
                                $allSnehaList->day_two=$inputAllData['day_two'][$key];
                                $allSnehaList->day_three=$inputAllData['day_three'][$key];
                                $allSnehaList->day_four=$inputAllData['day_four'][$key];
                                $allSnehaList->day_five=$inputAllData['day_five'][$key];
                                $allSnehaList->day_six=$inputAllData['day_six'][$key];
                                $allSnehaList->day_seven=$inputAllData['day_seven'][$key];
                                $allSnehaList->remark=$inputAllData['remark'][$key];
                                $allSnehaList->agrement_form_three_id  = $virechanKarmaId;
                                $allSnehaList->save();

                               }




                               return redirect()->route('agreementFormThree.index')->with('info','Updated successfully!');


                               }


                               public function destroy($id){


                                if (is_null($this->user) || !$this->user->can('agreementFormThreeDelete')) {
                                    abort(403, 'Sorry !! You are Unauthorized to View !');
                                       }


                                       $admins = AgrementFormThree::where('id',$id)->delete();


                            $deletePartTwo =AgrementFormThreeSnehaList::where('agrement_form_three_id',$id)->delete();





                                       return back()->with('error','Deleted successfully!');


                                   }
}
