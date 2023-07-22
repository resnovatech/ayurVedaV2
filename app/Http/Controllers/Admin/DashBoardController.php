<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\DoctorAppointment;
use App\Models\Therapist;
use App\Models\Doctor;
use App\Models\PatientAdmit;
use App\Models\WalkByPatient;
use App\Models\Patient;
use App\Models\Staff;
class DashBoardController extends Controller
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

        if (is_null($this->user) || !$this->user->can('dashboard.view')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }
               $totalDoctor = Doctor::count();
               $totalStaff = Staff::count();
               $totalTherapist = Therapist::count();
               $totalPatientAdmit = PatientAdmit::count();
               $totalPatient = Patient::count();
               $totalWalkByPatient = WalkByPatient::count();
               $doctorWaitingList = DoctorAppointment::where('status','=',null)->latest()->limit(5)->get();
               $therapistList = Therapist::latest()->limit(5)->get();
               $doctorList = Doctor::latest()->limit(5)->get();
        return view('admin.dashboard.dashboard',compact('totalWalkByPatient','totalPatient','totalPatientAdmit','totalTherapist','totalStaff','totalDoctor','doctorList','doctorWaitingList','therapistList'));
    }
}
