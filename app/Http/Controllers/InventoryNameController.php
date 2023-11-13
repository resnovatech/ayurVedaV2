<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryName;
use DB;
use Carbon\Carbon;
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
    
    
     public function inventoryMixerDelete($id){

        $admins =DB::table('therapy_ing_detail')->where('id',$id)->delete();
        return back()->with('error','Deleted successfully!');
    }
    
    
    public function inventoryMixerEdit($id){
        $medicineEquipments = InventoryName::latest()->get();
         $inventoryMixerEdit =DB::table('therapy_ing_detail')->where('id',$id)->first();
         return view('admin.inventoryMixerList.edit',compact('inventoryMixerEdit','medicineEquipments'));
    }
    
    
    
      public function inventoryMixerList(){


        if (is_null($this->user) || !$this->user->can('inventoryMixerAdd')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

          $medicineEquipments = DB::table('therapy_ing_detail')->latest()->get();



               return view('admin.inventoryMixerList.index',compact('medicineEquipments'));
           }
           
           
  public function inventoryMixerAdd(){


        if (is_null($this->user) || !$this->user->can('inventoryMixerAdd')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

          $medicineEquipments = InventoryName::latest()->get();



               return view('admin.inventoryMixerList.create',compact('medicineEquipments'));
           }

    public function index(){


        if (is_null($this->user) || !$this->user->can('inventoryCategoryAdd')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

          $medicineEquipments = InventoryName::latest()->get();



               return view('admin.inventoryName.index',compact('medicineEquipments'));
           }
           
           
           
           
           public function inventoryMixerStore(Request $request){
               
               
              // dd($request->all());
               $arr_all = implode(",",$request->mixerList);
               
               //dd($arr_all);
               
                  $inputAllData = $request->all();

                $ing_name = $inputAllData['mixerList'];
                
                
                 foreach($ing_name as $k=>$ing_names){
                 
                 
                    DB::table('therapy_ing_detail')->insert([
                 
                   'main_name' => $request->name,
                   'name' => $inputAllData['mixerList'][$k],
                   'created_at' => Carbon::now(),
                   'updated_at' => Carbon::now()
                  ]);
                }
                
                
                
                
                
               
             
                  
                  return redirect()->route('inventoryMixerList')->with('success','Added successfully!');
           }
           
           public function inventoryMixerUpdate(Request $request){
               
               
               // $arr_all = implode(",",$request->mixerList);
               
               //dd($arr_all);
               
               DB::table('therapy_ing_detail')->where('id',$request->id)->update([
                   'main_name' => $request->name,
                   'name' => $request->mixerList,
                   'updated_at' => Carbon::now()
                  ]);
                  
                  return redirect()->route('inventoryMixerList')->with('info','Updated successfully!');
               
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
