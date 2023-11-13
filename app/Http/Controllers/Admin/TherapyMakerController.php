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

        $therapyAppointmentDetailsRequest = TherapyAppointmentDetail::where('status','Therapy Ingredient Request')->latest()->get();
        $patientTherapyRequest = PatientTherapy::where('status','Therapy Ingredient Request')->latest()->get();


        $therapyAppointmentDetailsOngoing = TherapyAppointmentDetail::where('status','Ongoing Ingredient')->latest()->get();

//dd($therapyAppointmentDetailsRequest);



        $patientTherapyOngoing = PatientTherapy::where('status','Ongoing Ingredient')->latest()->get();
//dd($patientTherapyOngoing);

        $therapyAppointmentDetailsFinish = TherapyAppointmentDetail::where('status','Ready Ingredient')->latest()->get();
        $patientTherapyFinished = PatientTherapy::where('status','Ready Ingredient')->latest()->get();

        $therapyAppointmentDetails = TherapyAppointmentDetail::latest()->get();
        $patientTherapy = PatientTherapy::latest()->get();

        $patientHerb = PatientHerb::latest()->get();


        return view('admin.therapyMaker.index',compact('patientTherapyFinished','therapyAppointmentDetailsFinish','patientTherapyOngoing','therapyAppointmentDetailsOngoing','patientTherapyRequest','therapyAppointmentDetailsRequest','patientHerb','patientTherapy','therapyAppointmentDetails'));
    }
}
