<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\DietChart;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\WalkByPatient;
use App\Models\DoctorAppointment;
use App\Models\TreatMentChart;
use App\Models\PatientTherapy;
use Illuminate\Support\Facades\Auth;
class DietChartController extends Controller
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


        if (is_null($this->user) || !$this->user->can('dietChartsAdd')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

          $dietChartList = DietChart::latest()->get();



               return view('admin.dietChart.index',compact('dietChartList'));
           }


           public function create(){
            if (is_null($this->user) || !$this->user->can('dietChartsAdd')) {
                       abort(403, 'Sorry !! You are Unauthorized to Add !');
                   }
                   $walkByPatientList = WalkByPatient::latest()->get();
                   $patientList = Patient::latest()->get();
                   $doctorList = Doctor::latest()->get();
           //dd(1);
                   return view('admin.dietChart.create',compact('doctorList','walkByPatientList','patientList'));
               }


               public function edit($id){


                if (is_null($this->user) || !$this->user->can('dietChartsUpdate')) {
                    abort(403, 'Sorry !! You are Unauthorized to Add !');
                }

                $dietChartList = DietChart::find($id);


                $walkByPatientList = WalkByPatient::latest()->get();
                $patientList = Patient::latest()->get();
                $doctorList = Doctor::latest()->get();
        //dd(1);
                return view('admin.dietChart.edit',compact('dietChartList','doctorList','walkByPatientList','patientList'));


               }


           public function store(Request $request){

            if (is_null($this->user) || !$this->user->can('dietChartsAdd')) {
                abort(403, 'Sorry !! You are Unauthorized to Add !');
            }

            $request->validate([
                'name' => 'required',
                'file' => 'required',
                'patient_id' => 'required',
                'early_morning' => 'required',
                'brisk_walk' => 'required',
                'breakfast' => 'required',
                'lunch' => 'required',
                'evening' => 'required',
                'dinner' => 'required',
              ]);


             // Create New User
             $dietChartList = new DietChart();

             $dietChartList->name = $request->name;
             $dietChartList->patient_id = $request->patient_id;
             $dietChartList->early_morning = $request->early_morning;
             $dietChartList->brisk_walk = $request->brisk_walk;
             $dietChartList->breakfast = $request->breakfast;
             $dietChartList->lunch = $request->lunch;
             $dietChartList->evening = $request->evening;
             $dietChartList->dinner = $request->dinner;
             if ($request->hasfile('file')) {
                 $file = $request->file('file');
                 $extension = $file->getClientOriginalName();
                 $filename = $extension;
                 $file->move('public/uploads/', $filename);
                 $dietChartList->file =  'public/uploads/'.$filename;

             }


             $dietChartList->save();




    return redirect()->route('dietCharts.index')->with('success','Added successfully!');



        }





        public function update(Request $request,$id){

            if (is_null($this->user) || !$this->user->can('dietChartsUpdate')) {
                abort(403, 'Sorry !! You are Unauthorized to Update !');
            }




             // Create New User
             $dietChartList = DietChart::find($id);

             $dietChartList->name = $request->name;
             $dietChartList->patient_id = $request->patient_id;
             $dietChartList->early_morning = $request->early_morning;
             $dietChartList->brisk_walk = $request->brisk_walk;
             $dietChartList->breakfast = $request->breakfast;
             $dietChartList->lunch = $request->lunch;
             $dietChartList->evening = $request->evening;
             $dietChartList->dinner = $request->dinner;

             if ($request->hasfile('file')) {
                 $file = $request->file('file');
                 $extension = $file->getClientOriginalName();
                 $filename = $extension;
                 $file->move('public/uploads/', $filename);
                 $dietChartList->file =  'public/uploads/'.$filename;

             }


             $dietChartList->save();




    return redirect()->route('dietCharts.index')->with('success','Updated successfully!');



        }


        public function destroy($id)
    {

        if (is_null($this->user) || !$this->user->can('dietChartsDelete')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete !');
        }


        DietChart::destroy($id);
        return redirect()->route('dietCharts.index')->with('error','Deleted successfully!');
    }

}
