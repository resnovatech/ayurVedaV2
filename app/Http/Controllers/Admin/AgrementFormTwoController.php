<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AgrementFormTwo;
use App\Models\WalkByPatient;
use App\Models\Patient;
use App\Models\PatientAdmit;
use Illuminate\Support\Facades\Auth;
class AgrementFormTwoController extends Controller
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


        if (is_null($this->user) || !$this->user->can('agreementFormTwoView')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');

               }

               $agrementFormTwoList = AgrementFormTwo::latest()->get();

               return view('admin.agrementFormTwo.index',compact('agrementFormTwoList'));


           }


           public function create(){


            if (is_null($this->user) || !$this->user->can('agreementFormTwoAdd')) {
                abort(403, 'Sorry !! You are Unauthorized to View !');
                   }

                   $walkByPatientList = WalkByPatient::latest()->get();
                   $patientList = Patient::latest()->get();
                   return view('admin.agrementFormTwo.create',compact('walkByPatientList','patientList'));
               }


               public function edit($id){


                if (is_null($this->user) || !$this->user->can('agreementFormTwoUpdate')) {
                    abort(403, 'Sorry !! You are Unauthorized to View !');
                       }

                       $agrementFormTwoList = AgrementFormTwo::find($id);
                       $walkByPatientList = WalkByPatient::latest()->get();
                       $patientList = Patient::latest()->get();
                       return view('admin.agrementFormTwo.edit',compact('agrementFormTwoList','walkByPatientList','patientList'));


                   }



                   public function view($id){


                    if (is_null($this->user) || !$this->user->can('agreementFormTwoView')) {
                        abort(403, 'Sorry !! You are Unauthorized to View !');
                           }


                       }


                       public function print($id){


                        if (is_null($this->user) || !$this->user->can('agreementFormTwoView')) {
                            abort(403, 'Sorry !! You are Unauthorized to View !');
                               }


                           }

                       public function store(Request $request){


                        if (is_null($this->user) || !$this->user->can('agreementFormTwoAdd')) {
                            abort(403, 'Sorry !! You are Unauthorized to View !');
                               }

                              // dd($request->all());

                               $request->validate([

                                'name' => 'required',
                                'opd_no' => 'required',

                            ]);

                    $panchKarma = new AgrementFormTwo();
                    $panchKarma->admin_id = Auth::guard('admin')->user()->id;
                    $panchKarma->name = $request->name;
                    $panchKarma->opd_no = $request->opd_no;
                    $panchKarma->save();


return redirect()->route('agreementFormTwo.index')->with('success','Added successfully!');

                           }


                           public function update(Request $request,$id){


                            if (is_null($this->user) || !$this->user->can('agreementFormTwoUpdate')) {
                                abort(403, 'Sorry !! You are Unauthorized to View !');
                                   }


                                   $panchKarma = AgrementFormTwo::find($id);
                    $panchKarma->admin_id = Auth::guard('admin')->user()->id;
                    $panchKarma->name = $request->name;
                    $panchKarma->opd_no = $request->opd_no;
                    $panchKarma->save();


return redirect()->route('agreementFormTwo.index')->with('info','Updated successfully!');


                               }


                               public function destroy($id){


                                if (is_null($this->user) || !$this->user->can('agreementFormTwoDelete')) {
                                    abort(403, 'Sorry !! You are Unauthorized to View !');
                                       }


                                       $admins = AgrementFormTwo::where('id',$id)->delete();






                                                  return back()->with('error','Deleted successfully!');


                                   }
}
