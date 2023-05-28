<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicineEquipment;
use App\Models\Powder;
use Illuminate\Support\Facades\Auth;
class PowderController extends Controller
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


        if (is_null($this->user) || !$this->user->can('powderAdd')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

          $powders = Powder::latest()->get();

          $medicineEquipments = MedicineEquipment::latest()->get();

               return view('admin.powder.index',compact('powders','medicineEquipments'));
           }

           public function edit($id){


            if (is_null($this->user) || !$this->user->can('powderUpdate')) {
                abort(403, 'Sorry !! You are Unauthorized to View !');
                   }

              $allpowdersLists = Powder::find($id);

              $medicineEquipments = MedicineEquipment::latest()->get();

                   return view('admin.powder.edit',compact('allpowdersLists','medicineEquipments'));


           }


           public function store(Request $request){

            if (is_null($this->user) || !$this->user->can('powderAdd')) {
                abort(403, 'Sorry !! You are Unauthorized to Add !');
            }

           // dd($request->all());

            $request->validate([
                'name' => 'required',
                'amount' => 'required',
                'medicine_equipment_id.*' => 'required',
              ]);


              $arr_all = implode(",",$request->medicine_equipment_id);

              $data = array('name' => $request->name,'amount'=>$request->amount,'medicine_equipment_id'=>$arr_all);


             Powder::create($data);




    return redirect()->route('powderList.index')->with('success','Added successfully!');



        }





        public function update(Request $request,$id){

            if (is_null($this->user) || !$this->user->can('powderUpdate')) {
                abort(403, 'Sorry !! You are Unauthorized to Update !');
            }

            $medicine = Powder::findOrFail($id);

            $input = $request->all();
            $arr_all = implode(",",$request->medicine_equipment_id);

            $data = array('name' => $request->name,'amount'=>$request->amount,'medicine_equipment_id'=>$arr_all);
            $medicine->fill($data)->save();

    return redirect()->route('powderList.index')->with('success','Updated successfully!');



        }


        public function destroy($id)
    {

        if (is_null($this->user) || !$this->user->can('powderDelete')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete !');
        }


        Powder::destroy($id);
        return redirect()->route('powderList.index')->with('error','Deleted successfully!');
    }
}
