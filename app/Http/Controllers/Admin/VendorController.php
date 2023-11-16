<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
class VendorController extends Controller
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


        if (is_null($this->user) || !$this->user->can('vendorAdd')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

          $vendors = Vendor::latest()->get();



               return view('admin.vendor.index',compact('vendors'));
           }


           public function store(Request $request){

            if (is_null($this->user) || !$this->user->can('vendorAdd')) {
                abort(403, 'Sorry !! You are Unauthorized to Add !');
            }

            $request->validate([
                'name' => 'required',
                'phone'=>'required',
                'email'=>'required',
                'company_name'=>'required',
                'address'=>'required',

              ]);




             $input = $request->all();

             Vendor::create($input);




    return redirect()->route('vendor.index')->with('success','Added successfully!');



        }





        public function update(Request $request,$id){

            if (is_null($this->user) || !$this->user->can('vendorUpdate')) {
                abort(403, 'Sorry !! You are Unauthorized to Update !');
            }

            $medicine = Vendor::findOrFail($id);

            $input = $request->all();

            $medicine->fill($input)->save();

    return redirect()->route('vendor.index')->with('success','Updated successfully!');



        }


        public function destroy($id)
    {

        if (is_null($this->user) || !$this->user->can('vendorDelete')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete !');
        }


        Vendor::destroy($id);
        return redirect()->route('vendor.index')->with('error','Deleted successfully!');
    }
}
