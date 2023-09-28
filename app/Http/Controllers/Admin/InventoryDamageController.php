<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TherapyIngredient;
use Illuminate\Support\Facades\Auth;
use App\Models\MedicineEquipment;
use App\Models\PatientHerbDetail;
use App\Models\PatientTherapyDetail;
use App\Models\InventoryCategory;
use App\Models\InventoryDamage;
use App\Models\OtherIngredient;
use App\Models\InventoryName;
class InventoryDamageController extends Controller
{
    public function index(){

        $inventoryDamageList = InventoryDamage::latest()->get();


        $inventoryNames = InventoryName::latest()->get();
        $medicineEquipments = MedicineEquipment::latest()->get();
        $therapyIngredients = TherapyIngredient::latest()->get();
        $inventoryCategorys = InventoryCategory::latest()->get();
        $otherIngredients = OtherIngredient::latest()->get();

        return view('admin.inventoryDamage.index',compact('inventoryDamageList','inventoryNames','otherIngredients','inventoryCategorys','therapyIngredients','medicineEquipments'));
    }



    public function store(Request $request){

        //dd($request->all());
        $input = $request->all();


        if($request->category == 'Medicine Equipment'){

            //MedicineEquipment::create($input);


            $storeData = new InventoryDamage();
            $storeData->status = 'Medicine';
            $storeData->name = $request->name;
            $storeData->quantity = $request->quantity;
            $storeData->save();


        }elseif($request->category == 'therapy Ingredient'){

            //TherapyIngredient::create($input);


            $storeData = new InventoryDamage();
            $storeData->status = 'therapy';
            $storeData->name = $request->name;
            $storeData->quantity = $request->quantity;
            $storeData->save();


        }else{

            //OtherIngredient::create($input);

            $storeData = new InventoryDamage();
            $storeData->status = 'other';
            $storeData->name = $request->name;
            $storeData->quantity = $request->quantity;
            $storeData->save();
        }

        return redirect()->back()->with('success','Added successfully!');
    }


    public function destroy($id)
    {

        if (is_null($this->user) || !$this->user->can('inventoryDamageDelete')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete !');
        }


        InventoryDamage::destroy($id);
        return redirect()->route('inventoryDamage.index')->with('error','Deleted successfully!');
    }
}
