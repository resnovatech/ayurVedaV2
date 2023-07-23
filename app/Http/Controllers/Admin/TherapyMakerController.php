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

        $therapyAppointmentDetails = TherapyAppointmentDetail::latest()->get();
        $patientTherapy = PatientTherapy::latest()->get();
        $patientHerb = PatientHerb::latest()->get();


        return view('admin.therapyMaker.index',compact('patientHerb','patientTherapy','therapyAppointmentDetails'));
    }
}
