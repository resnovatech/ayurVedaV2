<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Therapist;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\TherapyAppointment;
use App\Models\TherapyAppointmentDateAndTime;
use App\Models\TherapyAppointmentDetail;
use App\Models\PatientTherapy;
class TherapistController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function therapyStatusUpdate(Request $request){


        if($request->mstatus == 2){


            $appoinmentId = TherapyAppointmentDetail::where('id',$request->id)
            ->value('therapy_appointment_id');

            TherapyAppointmentDetail::where('therapy_appointment_id',$appoinmentId)
            ->update([
                'status' => $request->status
             ]);


             if($request->status == 'Ongoing'){

                //dd(11);
                   $newStatus = 'Ongoing Process';
                   TherapyAppointmentDateAndTime::where('therapy_appointment_id',$appoinmentId)
            ->update([
                'status' => $newStatus
             ]);


             PatientTherapy::where('id',$appoinmentId)
             ->update([
                 'status' => $newStatus
              ]);
            }elseif($request->status == 'Finished'){
                $newStatus = 'Ready';
                TherapyAppointmentDateAndTime::where('id',$appoinmentId)
            ->update([
                'status' => $newStatus
             ]);


             PatientTherapy::where('id',$appoinmentId)
             ->update([
                 'status' => $newStatus
              ]);
            }



        }else{

        //dd($request->all());

        $appoinmentId = TherapyAppointmentDetail::where('id',$request->id)
        ->value('therapy_appointment_id');
//dd($appoinmentId);

        TherapyAppointmentDateAndTime::where('id',$request->id)
       ->update([
           'status' => $request->status
        ]);

        if($request->status == 'Ingredient Request Ready'){

            //dd(11);
               $newStatus = 'Request';
               TherapyAppointmentDetail::where('therapy_appointment_id',$appoinmentId)
        ->update([
            'status' => $newStatus
         ]);


         PatientTherapy::where('id',$appoinmentId)
         ->update([
             'status' => $newStatus
          ]);
        }elseif($request->status == 'End'){
            $newStatus = 'Finished';
            TherapyAppointmentDetail::where('id',$appoinmentId)
        ->update([
            'status' => $newStatus
         ]);


         PatientTherapy::where('id',$appoinmentId)
         ->update([
             'status' => $newStatus
          ]);
        }

    }
        return redirect()->back()->with('success','Updated successfully!');


    }


    public function index(){


        if (is_null($this->user) || !$this->user->can('therapistView')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

          $therapistList = Therapist::latest()->get();



               return view('admin.therapistList.index',compact('therapistList'));
           }


           public function show($id){

            $therapistList = Therapist::find($id);
            $therapyAppointmentDateAndTimeList = TherapyAppointmentDateAndTime::where('date',date('Y-m-d'))
            ->where('therapist',$id)->where('face_pack_status',0)->latest()->get();

            $tomorrow = Carbon::tomorrow()->toDateString();
            $yesterday  = Carbon::yesterday ()->toDateString();

            $therapyAppointmentDateAndTimeListTomorrow = TherapyAppointmentDateAndTime::where('date',$tomorrow)
            ->where('therapist',$id)->where('face_pack_status',0)->latest()->get();
            $therapyAppointmentDateAndTimeListYesterday = TherapyAppointmentDateAndTime::where('date',$yesterday)
            ->where('therapist',$id)->where('face_pack_status',0)->latest()->get();


            $therapyAppointmentComplete = TherapyAppointmentDateAndTime::where('status','End')
            ->where('therapist',$id)->where('face_pack_status',0)->latest()->get();


            $therapyAppointmentPending = TherapyAppointmentDateAndTime::whereNull('status')
            ->where('therapist',$id)->where('face_pack_status',0)->latest()->get();

            //dd($therapyAppointmentPending);


            $therapyAppointmentCancellled = TherapyAppointmentDateAndTime::where('status','Cancelled')
            ->where('therapist',$id)->where('face_pack_status',0)->latest()->get();


            return view('admin.therapistList.view',
            compact('therapyAppointmentCancellled','therapyAppointmentPending','therapyAppointmentComplete','therapyAppointmentDateAndTimeListYesterday','therapyAppointmentDateAndTimeListTomorrow','therapyAppointmentDateAndTimeList','therapistList','therapyAppointmentCancellled','therapyAppointmentPending','therapyAppointmentComplete'));
           }


           public function store(Request $request){

            if (is_null($this->user) || !$this->user->can('therapistAdd')) {
                abort(403, 'Sorry !! You are Unauthorized to Add !');
            }

            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone_or_mobile_number' => 'required',
                'address' => 'required',
                'nid_number' => 'required',
                'nationality' => 'required',
                'dob' => 'required',
                'years_of_experience' => 'required',

            ]);


            $staff = new Therapist();
            $staff->admin_id = Auth::guard('admin')->user()->id;
            $staff->name = $request->name;
            $staff->email = $request->email;
            $staff->phone_or_mobile_number = $request->phone_or_mobile_number;
            $staff->address = $request->address;
            $staff->nid_number = $request->nid_number;
            $staff->nationality = $request->nationality;
            $staff->dob = $request->dob;
            $staff->years_of_experience = $request->years_of_experience;
            $staff->save();

            $staffId = $staff->id;




            $admins = new Admin();
            $admins->name = $request->name;
            $admins->staff_id = $staffId;
            $admins->phone = $request->phone_or_mobile_number;
            $admins->email = $request->email;
            $admins->password = Hash::make(12345678);
            $admins->save();
            $admins->assignRole('therapist');





    return redirect()->route('therapist.index')->with('success','Added successfully!');



        }


        public function update(Request $request,$id){

            if (is_null($this->user) || !$this->user->can('therapistUpdate')) {
                abort(403, 'Sorry !! You are Unauthorized to Update !');
            }

            $staff = Therapist::findOrFail($id);

            $input = $request->all();

            $staff->fill($input)->save();


            Admin::where('staff_id', $id)
       ->update([
           'name' => $request->name,
           'phone' => $request->phone_or_mobile_number,
           'email' => $request->email,
        ]);



    return redirect()->route('therapist.index')->with('success','Updated successfully!');



        }


        public function destroy($id)
    {

        if (is_null($this->user) || !$this->user->can('therapistDelete')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete !');
        }


        Therapist::destroy($id);
        return redirect()->route('therapist.index')->with('error','Deleted successfully!');
    }
}
