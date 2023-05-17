<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\WalkByPatient;
use App\Models\DoctorAppointment;
use App\Models\PatientHistory;
use App\Models\TherapyList;
use App\Models\Medicine;
use App\Models\HealthSupplement;
use App\Models\PatientTherapy;
use App\Models\PatientHerb;
use App\Models\PatientMedicalSupplement;
class PatientPrecriptionController extends Controller
{
    public function index(){

        $getHistoryData = PatientHistory::latest()->get();
        return view('admin.prescriptionList.index',compact('getHistoryData'));
    }

     public function show($id){

    }
}
