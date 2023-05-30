<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AgrementFormThree;
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


                           }


                           public function update(Request $request,$id){


                            if (is_null($this->user) || !$this->user->can('agreementFormThreeUpdate')) {
                                abort(403, 'Sorry !! You are Unauthorized to View !');
                                   }


                               }


                               public function destroy($id){


                                if (is_null($this->user) || !$this->user->can('agreementFormThreeDelete')) {
                                    abort(403, 'Sorry !! You are Unauthorized to View !');
                                       }


                                   }
}
