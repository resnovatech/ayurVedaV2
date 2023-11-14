<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SalaryType;
use Illuminate\Support\Facades\Auth;
class SalaryTypeController extends Controller
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


        if (is_null($this->user) || !$this->user->can('salaryTypeAdd')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

          $salaryTypes = SalaryType::latest()->get();



               return view('admin.salaryType.index',compact('salaryTypes'));
           }


           public function store(Request $request){

            if (is_null($this->user) || !$this->user->can('salaryTypeAdd')) {
                abort(403, 'Sorry !! You are Unauthorized to Add !');
            }

            $request->validate([
                'name' => 'required',
                'action'=>'required'

              ]);




             $input = $request->all();

             SalaryType::create($input);




    return redirect()->route('salaryType.index')->with('success','Added successfully!');



        }





        public function update(Request $request,$id){

            if (is_null($this->user) || !$this->user->can('salaryTypeUpdate')) {
                abort(403, 'Sorry !! You are Unauthorized to Update !');
            }

            $medicine = SalaryType::findOrFail($id);

            $input = $request->all();

            $medicine->fill($input)->save();

    return redirect()->route('salaryType.index')->with('success','Updated successfully!');



        }


        public function destroy($id)
    {

        if (is_null($this->user) || !$this->user->can('salaryTypeDelete')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete !');
        }


        SalaryType::destroy($id);
        return redirect()->route('salaryType.index')->with('error','Deleted successfully!');
    }
}
