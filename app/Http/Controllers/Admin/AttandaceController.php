<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attandance;
use App\Models\Staff;
use App\Models\Therapist;
use App\Models\Doctor;
class AttandaceController extends Controller
{


    public function index(){

        $attendanceList = Attandance::latest()->get();

        return view('admin.attandance.index',compact('attendanceList'));
    }
    public function create(){

        $staffList = Staff::latest()->get();
        $therapistList = Therapist::latest()->get();
        $doctorList = Doctor::latest()->get();
$date =date('Y-m-d');
        $attendanceList = Attandance::where('date',$date)->latest()->get();

        return view('admin.attandance.create',compact('attendanceList','staffList','therapistList','doctorList'));
    }



    public function edit($id){

        $staffList = Staff::latest()->get();
        $therapistList = Therapist::latest()->get();
        $doctorList = Doctor::latest()->get();
$date =date('Y-m-d');
        $attendanceList = Attandance::where('id',$id)->first();

        return view('admin.attandance.edit',compact('attendanceList','staffList','therapistList','doctorList'));

    }


    public function update(Request $request,$id){

        $insertData = Attandance::find($id);
        $insertData->employee_id = $request->employee_id;
        $insertData->date = $request->date;
        $insertData->checkintime = $request->checkintime;
        $insertData->checkouttime = $request->checkouttime;
        $insertData->save();

        return redirect()->route('attandace.index')->with('success','Update successfully!');

    }

    public function destroy($id)
    {
        Attandance::destroy($id);
        return redirect()->route('attandace.index')->with('error','Deleted successfully!');
    }


    public function  store(Request $request){


        //dd($request->all());

        if(empty($request->date)){
            $insertData = Attandance::find($request->name);
            $insertData->status = 1;
            $insertData->checkouttime = $request->checkouttime;
            $insertData->save();

        }else{

        $insertData = new Attandance();
        $insertData->employee_id = $request->name;
        $insertData->date = $request->dob;
        $insertData->checkintime = $request->checkintime;
        $insertData->save();
        }
        return redirect()->back()->with('success','Insert successfully!');
    }
}
