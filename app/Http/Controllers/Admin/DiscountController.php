<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InventoryName;
use Illuminate\Support\Facades\Auth;
use App\Models\Vat;
use App\Models\Discount;
class DiscountController extends Controller
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


        if (is_null($this->user) || !$this->user->can('discount.Add')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

          $medicineEquipments = Discount::latest()->get();



               return view('admin.newdiscount.index',compact('medicineEquipments'));
           }


           public function store(Request $request){

            if (is_null($this->user) || !$this->user->can('discount.Add')) {
                abort(403, 'Sorry !! You are Unauthorized to Add !');
            }

            $request->validate([
                'name' => 'required',
                'amount' => 'required',
                'client_type'=> 'required',
              ]);




             $input = $request->all();

             Discount::create($input);




    return redirect()->route('discount.index')->with('success','Added successfully!');



        }





        public function update(Request $request,$id){

            if (is_null($this->user) || !$this->user->can('discount.Update')) {
                abort(403, 'Sorry !! You are Unauthorized to Update !');
            }

            $medicine = Discount::findOrFail($id);

            $input = $request->all();

            $medicine->fill($input)->save();

    return redirect()->route('discount.index')->with('success','Updated successfully!');



        }


        public function destroy($id)
    {

        if (is_null($this->user) || !$this->user->can('discount.Delete')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete !');
        }


        Discount::destroy($id);
        return redirect()->route('discount.index')->with('error','Deleted successfully!');
    }
}
