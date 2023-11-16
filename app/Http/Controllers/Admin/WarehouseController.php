<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use App\Models\InventoryName;
use App\Models\Warhouse;
class WarehouseController extends Controller
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


        if (is_null($this->user) || !$this->user->can('warehouseAdd')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

          $warehouses  = Warhouse::latest()->get();

          $inventoryName = InventoryName::latest()->get();

          $vendor = Vendor::latest()->get();

               return view('admin.warehouse.index',compact('vendor','inventoryName','warehouses'));
           }




           public function create(){

            if (is_null($this->user) || !$this->user->can('warehouseAdd')) {
                abort(403, 'Sorry !! You are Unauthorized to View !');
                   }

              $warehouses  = Warhouse::latest()->get();

              $inventoryName = InventoryName::latest()->get();

              $vendor = Vendor::latest()->get();

        return view('admin.warehouse.create',compact('vendor','inventoryName','warehouses'));
           }


           public function edit($id){


            if (is_null($this->user) || !$this->user->can('warehouseUpdate')) {
                abort(403, 'Sorry !! You are Unauthorized to View !');
                   }

              $warehouses  = Warhouse::where('id',$id)->first();

              $inventoryName = InventoryName::latest()->get();

              $vendor = Vendor::latest()->get();

        return view('admin.warehouse.edit',compact('vendor','inventoryName','warehouses'));

           }


           public function store(Request $request){

            if (is_null($this->user) || !$this->user->can('warehouseAdd')) {
                abort(403, 'Sorry !! You are Unauthorized to Add !');
            }

            // $request->validate([
            //     'name' => 'required',
            //     'phone'=>'required',
            //     'email'=>'required',
            //     'company_name'=>'required',
            //     'address'=>'required',

            //   ]);




             $input = $request->all();

             Warhouse::create($input);




    return redirect()->route('warehouse.index')->with('success','Added successfully!');



        }





        public function update(Request $request,$id){

            if (is_null($this->user) || !$this->user->can('warehouseUpdate')) {
                abort(403, 'Sorry !! You are Unauthorized to Update !');
            }

            $medicine = Warhouse::findOrFail($id);

            $input = $request->all();

            $medicine->fill($input)->save();

    return redirect()->route('warehouse.index')->with('success','Updated successfully!');



        }


        public function destroy($id)
    {

        if (is_null($this->user) || !$this->user->can('warehouseDelete')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete !');
        }


        Warhouse::destroy($id);
        return redirect()->route('warehouse.index')->with('error','Deleted successfully!');
    }
}
