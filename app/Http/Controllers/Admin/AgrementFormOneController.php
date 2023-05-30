<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AgrementFormOne;
use App\Models\WalkByPatient;
use App\Models\Patient;
use App\Models\PatientAdmit;
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

        $checkValueAvailableOrNot = Patient::where('patient_id',$request->get('search'))
        ->orwhere('name',$request->get('search'))
        ->orwhere('phone_or_mobile_number',$request->get('search'))->value('name');


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


                           }


                           public function update(Request $request,$id){


                            if (is_null($this->user) || !$this->user->can('agreementFormOneUpdate')) {
                                abort(403, 'Sorry !! You are Unauthorized to View !');
                                   }


                               }


                               public function destroy($id){


                                if (is_null($this->user) || !$this->user->can('agreementFormOneDelete')) {
                                    abort(403, 'Sorry !! You are Unauthorized to View !');
                                       }


                                   }
}
