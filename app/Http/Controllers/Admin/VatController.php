<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InventoryName;
use Illuminate\Support\Facades\Auth;
use App\Models\Vat;
class VatController extends Controller
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


        if (is_null($this->user) || !$this->user->can('vatAdd')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

          $medicineEquipments = Vat::latest()->get();



               return view('admin.vat.index',compact('medicineEquipments'));
           }


           public function store(Request $request){

            if (is_null($this->user) || !$this->user->can('vatAdd')) {
                abort(403, 'Sorry !! You are Unauthorized to Add !');
            }

            $request->validate([
                'name' => 'required',
                'amount' => 'required',
              ]);




             $input = $request->all();

             Vat::create($input);




    return redirect()->route('vat.index')->with('success','Added successfully!');



        }





        public function update(Request $request,$id){

            if (is_null($this->user) || !$this->user->can('vatUpdate')) {
                abort(403, 'Sorry !! You are Unauthorized to Update !');
            }

            $medicine = Vat::findOrFail($id);

            $input = $request->all();

            $medicine->fill($input)->save();

    return redirect()->route('vat.index')->with('success','Updated successfully!');



        }


        public function destroy($id)
    {

        if (is_null($this->user) || !$this->user->can('vatDelete')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete !');
        }


        Vat::destroy($id);
        return redirect()->route('vat.index')->with('error','Deleted successfully!');
    }
}
