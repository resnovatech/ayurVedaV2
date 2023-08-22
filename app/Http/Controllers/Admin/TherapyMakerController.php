<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TherapyAppointmentDetail;
use App\Models\PatientTherapy;
use App\Models\PatientHerb;
class TherapyMakerController extends Controller
{
    public function index(){

        $therapyAppointmentDetailsRequest = TherapyAppointmentDetail::where('status','Request')->latest()->get();
        $patientTherapyRequest = PatientTherapy::where('status','Request')->latest()->get();


        $therapyAppointmentDetailsOngoing = TherapyAppointmentDetail::where('status','Ongoing')->latest()->get();
        $patientTherapyOngoing = PatientTherapy::where('status','Ongoing')->latest()->get();


        $therapyAppointmentDetailsFinish = TherapyAppointmentDetail::where('status','Finished')->latest()->get();
        $patientTherapyFinished = PatientTherapy::where('status','Finished')->latest()->get();

        $therapyAppointmentDetails = TherapyAppointmentDetail::latest()->get();
        $patientTherapy = PatientTherapy::latest()->get();

        $patientHerb = PatientHerb::latest()->get();


        return view('admin.therapyMaker.index',compact('patientTherapyFinished','therapyAppointmentDetailsFinish','patientTherapyOngoing','therapyAppointmentDetailsOngoing','patientTherapyRequest','therapyAppointmentDetailsRequest','patientHerb','patientTherapy','therapyAppointmentDetails'));
    }
}
