<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LeaveType;
use Illuminate\Support\Facades\Auth;
class LeaveTypeController extends Controller
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


        if (is_null($this->user) || !$this->user->can('leaveTypeAdd')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

          $leaveTypes = LeaveType::latest()->get();



               return view('admin.leaveType.index',compact('leaveTypes'));
           }


           public function store(Request $request){

            if (is_null($this->user) || !$this->user->can('leaveTypeAdd')) {
                abort(403, 'Sorry !! You are Unauthorized to Add !');
            }

            $request->validate([
                'name' => 'required',
                'total_day'=>'required'

              ]);




             $input = $request->all();

             LeaveType::create($input);




    return redirect()->route('leaveType.index')->with('success','Added successfully!');



        }





        public function update(Request $request,$id){

            if (is_null($this->user) || !$this->user->can('leaveTypeUpdate')) {
                abort(403, 'Sorry !! You are Unauthorized to Update !');
            }

            $medicine = LeaveType::findOrFail($id);

            $input = $request->all();

            $medicine->fill($input)->save();

    return redirect()->route('leaveType.index')->with('success','Updated successfully!');



        }


        public function destroy($id)
    {

        if (is_null($this->user) || !$this->user->can('leaveTypeDelete')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete !');
        }


        LeaveType::destroy($id);
        return redirect()->route('leaveType.index')->with('error','Deleted successfully!');
    }
}
