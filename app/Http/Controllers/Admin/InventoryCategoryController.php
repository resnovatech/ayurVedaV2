<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InventoryCategory;
use Illuminate\Support\Facades\Auth;
class InventoryCategoryController extends Controller
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

          $medicineEquipments = InventoryCategory::latest()->get();



               return view('admin.inventoryCategory.index',compact('medicineEquipments'));
           }


           public function store(Request $request){

            if (is_null($this->user) || !$this->user->can('inventoryCategoryAdd')) {
                abort(403, 'Sorry !! You are Unauthorized to Add !');
            }

            $request->validate([
                'name' => 'required',

              ]);




             $input = $request->all();

             InventoryCategory::create($input);




    return redirect()->route('inventoryCategoryList.index')->with('success','Added successfully!');



        }





        public function update(Request $request,$id){

            if (is_null($this->user) || !$this->user->can('inventoryCategoryUpdate')) {
                abort(403, 'Sorry !! You are Unauthorized to Update !');
            }

            $medicine = InventoryCategory::findOrFail($id);

            $input = $request->all();

            $medicine->fill($input)->save();

    return redirect()->route('inventoryCategoryList.index')->with('success','Updated successfully!');



        }


        public function destroy($id)
    {

        if (is_null($this->user) || !$this->user->can('inventoryCategoryDelete')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete !');
        }


        InventoryCategory::destroy($id);
        return redirect()->route('inventoryCategoryList.index')->with('error','Deleted successfully!');
    }
}
