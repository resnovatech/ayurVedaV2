<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicineEquipment;
use App\Models\Powder;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;
class PackageController extends Controller
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


        if (is_null($this->user) || !$this->user->can('packageAdd')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

          $packages = Package::latest()->get();

          $powders = Powder::latest()->get();

               return view('admin.package.index',compact('packages','powders'));
           }


           public function edit($id){


            if (is_null($this->user) || !$this->user->can('packageUpdate')) {
                abort(403, 'Sorry !! You are Unauthorized to View !');
                   }

              $allpackagesLists = Package::find($id);

              $powders = Powder::latest()->get();

                   return view('admin.package.edit',compact('allpackagesLists','powders'));
               }


           public function store(Request $request){

            if (is_null($this->user) || !$this->user->can('packageAdd')) {
                abort(403, 'Sorry !! You are Unauthorized to Add !');
            }

           // dd($request->all());

            $request->validate([
                'name' => 'required',
                'amount' => 'required',
                'powder_id.*' => 'required',
              ]);


              $arr_all = implode(",",$request->powder_id);

              $arr_all1 = implode(",",$request->pamount);

              $data = array('name' => $request->name,'amount'=>$request->amount,'powder_id'=>$arr_all,'powder_amount'=>$arr_all1);


             Package::create($data);




    return redirect()->route('packageList.index')->with('success','Added successfully!');



        }





        public function update(Request $request,$id){

            if (is_null($this->user) || !$this->user->can('packageUpdate')) {
                abort(403, 'Sorry !! You are Unauthorized to Update !');
            }

            $medicine = Package::findOrFail($id);

            $input = $request->all();
            $arr_all = implode(",",$request->powder_id);

            $arr_all1 = implode(",",$request->pamount);

            $data = array('name' => $request->name,'amount'=>$request->amount,'powder_id'=>$arr_all,'powder_amount'=>$arr_all1);
            $medicine->fill($data)->save();

    return redirect()->route('packageList.index')->with('success','Updated successfully!');



        }


        public function destroy($id)
    {

        if (is_null($this->user) || !$this->user->can('packageDelete')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete !');
        }


        Package::destroy($id);
        return redirect()->route('packageList.index')->with('error','Deleted successfully!');
    }
}
