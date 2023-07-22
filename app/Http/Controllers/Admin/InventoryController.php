<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TherapyIngredient;
use Illuminate\Support\Facades\Auth;
use App\Models\MedicineEquipment;
use App\Models\PatientHerbDetail;
use App\Models\PatientTherapyDetail;
class InventoryController extends Controller
{
    public function index(){

        $medicineEquipments = MedicineEquipment::latest()->get();
        $therapyIngredients = TherapyIngredient::latest()->get();



        return view('admin.inventory.index',compact('therapyIngredients','medicineEquipments'));
    }
}
