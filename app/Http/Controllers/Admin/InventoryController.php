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
use App\Models\OtherIngredient;
use App\Models\InventoryName;
class InventoryController extends Controller
{
    public function index(){
        $inventoryNames = InventoryName::latest()->get();
        $medicineEquipments = MedicineEquipment::latest()->get();
        $therapyIngredients = TherapyIngredient::latest()->get();
        $inventoryCategorys = InventoryCategory::latest()->get();
        $otherIngredients = OtherIngredient::latest()->get();

        return view('admin.inventory.index',compact('inventoryNames','otherIngredients','inventoryCategorys','therapyIngredients','medicineEquipments'));
    }


    public function store(Request $request){

        //dd($request->all());
        $input = $request->all();
        if($request->category == 'Medicine Equipment'){

            MedicineEquipment::create($input);

        }elseif($request->category == 'therapy Ingredient'){

            TherapyIngredient::create($input);
        }else{

            OtherIngredient::create($input);
        }

        return redirect()->back()->with('success','Added successfully!');
    }
}
