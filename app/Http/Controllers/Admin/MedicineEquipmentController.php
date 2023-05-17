<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicineEquipment;
use Illuminate\Support\Facades\Auth;
class MedicineEquipmentController extends Controller
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


        if (is_null($this->user) || !$this->user->can('medicineEquipmentAdd')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

          $medicineEquipments = MedicineEquipment::latest()->get();



               return view('admin.medicineEquipment.index',compact('medicineEquipments'));
           }


           public function store(Request $request){

            if (is_null($this->user) || !$this->user->can('medicineEquipmentAdd')) {
                abort(403, 'Sorry !! You are Unauthorized to Add !');
            }

            $request->validate([
                'name' => 'required',

              ]);




             $input = $request->all();

             MedicineEquipment::create($input);




    return redirect()->route('medicineEquipment.index')->with('success','Added successfully!');



        }





        public function update(Request $request,$id){

            if (is_null($this->user) || !$this->user->can('medicineEquipmentUpdate')) {
                abort(403, 'Sorry !! You are Unauthorized to Update !');
            }

            $medicine = MedicineEquipment::findOrFail($id);

            $input = $request->all();

            $medicine->fill($input)->save();

    return redirect()->route('medicineEquipment.index')->with('success','Updated successfully!');



        }


        public function destroy($id)
    {

        if (is_null($this->user) || !$this->user->can('medicineEquipmentDelete')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete !');
        }


        MedicineEquipment::destroy($id);
        return redirect()->route('medicineEquipment.index')->with('error','Deleted successfully!');
    }
}
