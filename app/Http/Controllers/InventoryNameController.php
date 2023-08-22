<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryName;
use Illuminate\Support\Facades\Auth;
class InventoryNameController extends Controller
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


        if (is_null($this->user) || !$this->user->can('inventoryCategoryAdd')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

          $medicineEquipments = InventoryName::latest()->get();



               return view('admin.inventoryName.index',compact('medicineEquipments'));
           }


           public function store(Request $request){

            if (is_null($this->user) || !$this->user->can('inventoryCategoryAdd')) {
                abort(403, 'Sorry !! You are Unauthorized to Add !');
            }

            $request->validate([
                'name' => 'required',

              ]);




             $input = $request->all();

             InventoryName::create($input);




    return redirect()->route('inventoryNameInfo.index')->with('success','Added successfully!');



        }





        public function update(Request $request,$id){

            if (is_null($this->user) || !$this->user->can('inventoryCategoryUpdate')) {
                abort(403, 'Sorry !! You are Unauthorized to Update !');
            }

            $medicine = InventoryName::findOrFail($id);

            $input = $request->all();

            $medicine->fill($input)->save();

    return redirect()->route('inventoryNameInfo.index')->with('success','Updated successfully!');



        }


        public function destroy($id)
    {

        if (is_null($this->user) || !$this->user->can('inventoryCategoryDelete')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete !');
        }


        InventoryName::destroy($id);
        return redirect()->route('inventoryNameInfo.index')->with('error','Deleted successfully!');
    }
}
