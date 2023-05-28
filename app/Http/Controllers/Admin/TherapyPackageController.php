<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicineEquipment;
use App\Models\Powder;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;
use App\Models\TherapyList;
use App\Models\TherapyPackage;
class TherapyPackageController extends Controller
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

          $packages = TherapyPackage::latest()->get();

          $therapLists = TherapyList::latest()->get();

               return view('admin.therapyPackage.index',compact('packages','therapLists'));
           }


           public function edit($id){



        if (is_null($this->user) || !$this->user->can('therapyPackagesUpdate')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

          $allpackagesLists = TherapyPackage::find($id);

          $therapLists = TherapyList::latest()->get();

        return view('admin.therapyPackage.edit',compact('allpackagesLists','therapLists'));



           }


           public function store(Request $request){

            if (is_null($this->user) || !$this->user->can('therapyPackagesAdd')) {
                abort(403, 'Sorry !! You are Unauthorized to Add !');
            }


//dd($request->all());
            $request->validate([
                'package_name' => 'required',
                'price' => 'required',
                'therapy_list.*' => 'required',
              ]);


              $arr_all = implode(",",$request->therapy_list);

              $data = array('package_name' => $request->package_name,'price'=>$request->price,'therapy_list'=>$arr_all);


              TherapyPackage::create($data);




    return redirect()->route('therapyPackages.index')->with('success','Added successfully!');



        }





        public function update(Request $request,$id){

            if (is_null($this->user) || !$this->user->can('therapyPackagesUpdate')) {
                abort(403, 'Sorry !! You are Unauthorized to Update !');
            }

            $medicine = TherapyPackage::findOrFail($id);

            $input = $request->all();
            $arr_all = implode(",",$request->therapy_list);



            $data = array('package_name' => $request->package_name,'price'=>$request->price,'therapy_list'=>$arr_all);
            $medicine->fill($data)->save();

    return redirect()->route('therapyPackages.index')->with('success','Updated successfully!');



        }


        public function destroy($id)
    {

        if (is_null($this->user) || !$this->user->can('therapyPackagesDelete')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete !');
        }


        TherapyPackage::destroy($id);
        return redirect()->route('therapyPackages.index')->with('error','Deleted successfully!');
    }
}
