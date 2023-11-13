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

use App\Models\OtherEquipment;
use App\Models\OtherEquipmentDetail;
class OtherEquipmentController extends Controller
{
    public function create(){

        $inventoryNames = InventoryName::latest()->get();
        $medicineEquipments = MedicineEquipment::latest()->get();
        $therapyIngredients = TherapyIngredient::latest()->get();
        $inventoryCategorys = InventoryCategory::latest()->get();
        $otherIngredients = OtherIngredient::latest()->get();

        return view('admin.otherEquipment.create',compact('inventoryNames','otherIngredients','inventoryCategorys','therapyIngredients','medicineEquipments'));
    }


    public function index(){

        $inventoryNames = InventoryName::latest()->get();
        $medicineEquipments = MedicineEquipment::latest()->get();
        $therapyIngredients = TherapyIngredient::latest()->get();
        $inventoryCategorys = InventoryCategory::latest()->get();
        $otherIngredients = OtherIngredient::latest()->get();


        $otherEquipments = OtherEquipment::latest()->get();

        return view('admin.otherEquipment.index',compact('otherEquipments','inventoryNames','otherIngredients','inventoryCategorys','therapyIngredients','medicineEquipments'));
    }



    public function store(Request $request){





        //dd($finalResult);

        //new code

        if($request->equipmentType == 'normal'){

            $formCategory = substr($request->category,-1);



            $finalResult1 = substr($request->category, 0, -2);


            if($formCategory == 1){



                $getPreviousQuantity = TherapyIngredient::where('name',$finalResult1)->value('quantity');

                $finalResult =$getPreviousQuantity - $request->quantity;




                     $mainOtherEquipment = new OtherEquipment();
                     $mainOtherEquipment->name =$request->name();
                     $mainOtherEquipment->save();


                     $mainOtherEquipmentId = $mainOtherEquipment->id;


                     $otherInfoDetail = new OtherEquipmentDetail();
                     $otherInfoDetail->other_equipment_id = $mainOtherEquipmentId;
                     $otherInfoDetail->name = $finalResult1;
                     $otherInfoDetail->quantity =$request->quantity;
                     $otherInfoDetail->unit =$request->unit;
                     $otherInfoDetail->save();


                     TherapyIngredient::where('name',$finalResult1)
           ->update([
               'quantity' => $finalResult
            ]);







            }elseif($formCategory == 2){


                $getPreviousQuantity = MedicineEquipment::where('name',$finalResult1)->value('quantity');

                $finalResult =$getPreviousQuantity - $request->quantity;




                     $mainOtherEquipment = new OtherEquipment();
                     $mainOtherEquipment->name =$request->name;
                     $mainOtherEquipment->save();


                     $mainOtherEquipmentId = $mainOtherEquipment->id;


                     $otherInfoDetail = new OtherEquipmentDetail();
                     $otherInfoDetail->other_equipment_id = $mainOtherEquipmentId;
                     $otherInfoDetail->name = $finalResult1;
                     $otherInfoDetail->quantity =$request->quantity;
                     $otherInfoDetail->unit =$request->unit;
                     $otherInfoDetail->save();


                     MedicineEquipment::where('name',$finalResult1)
           ->update([
               'quantity' => $finalResult
            ]);





            }elseif($formCategory == 3){



                $getPreviousQuantity = OtherIngredient::where('name',$finalResult1)->value('quantity');

                $finalResult =$getPreviousQuantity - $request->quantity;




                     $mainOtherEquipment = new OtherEquipment();
                     $mainOtherEquipment->name =$request->name();
                     $mainOtherEquipment->save();


                     $mainOtherEquipmentId = $mainOtherEquipment->id;


                     $otherInfoDetail = new OtherEquipmentDetail();
                     $otherInfoDetail->other_equipment_id = $mainOtherEquipmentId;
                     $otherInfoDetail->name = $finalResult1;
                     $otherInfoDetail->quantity =$request->quantity;
                     $otherInfoDetail->unit =$request->unit;
                     $otherInfoDetail->save();


                     OtherIngredient::where('name',$finalResult1)
           ->update([
               'quantity' => $finalResult
            ]);

            }





        }elseif($request->equipmentType == 'mixer'){

            //dd($request->all());

            $inputAllData = $request->all();
            $allCatData = $inputAllData['category'];


            $mainOtherEquipment = new OtherEquipment();
            $mainOtherEquipment->name =$request->name;
            $mainOtherEquipment->save();

            $mainOtherEquipmentId = $mainOtherEquipment->id;


            foreach($allCatData as $key => $allCatDataMain){


                $formCategory = substr($inputAllData['category'][$key],-1);



                $finalResult1 = substr($inputAllData['category'][$key], 0, -2);


//dd($finalResult1);




                if($formCategory == 1){



                    $getPreviousQuantity = TherapyIngredient::where('name',$finalResult1)->value('quantity');

                    $finalResult =$getPreviousQuantity - $request->quantity[$key];










                         $otherInfoDetail = new OtherEquipmentDetail();
                         $otherInfoDetail->other_equipment_id = $mainOtherEquipmentId;
                         $otherInfoDetail->name = $finalResult1;
                         $otherInfoDetail->quantity =$inputAllData['quantity'][$key];
                         $otherInfoDetail->unit =$inputAllData['unit'][$key];
                         $otherInfoDetail->save();


                         TherapyIngredient::where('name',$finalResult1)
               ->update([
                   'quantity' => $finalResult
                ]);







                }elseif($formCategory == 2){


                    $getPreviousQuantity = MedicineEquipment::where('name',$finalResult1)->value('quantity');

                    $finalResult =$getPreviousQuantity - $request->quantity[$key];









                         $otherInfoDetail = new OtherEquipmentDetail();
                         $otherInfoDetail->other_equipment_id = $mainOtherEquipmentId;
                         $otherInfoDetail->name = $finalResult1;
                         $otherInfoDetail->quantity =$inputAllData['quantity'][$key];
                         $otherInfoDetail->unit =$inputAllData['unit'][$key];
                         $otherInfoDetail->save();


                         MedicineEquipment::where('name',$finalResult1)
               ->update([
                   'quantity' => $finalResult
                ]);





                }elseif($formCategory == 3){



                    $getPreviousQuantity = OtherIngredient::where('name',$finalResult1)->value('quantity');

                    $finalResult =$getPreviousQuantity - $request->quantity[$key];







                         $otherInfoDetail = new OtherEquipmentDetail();
                         $otherInfoDetail->other_equipment_id = $mainOtherEquipmentId;
                         $otherInfoDetail->name = $finalResult1;
                         $otherInfoDetail->quantity =$inputAllData['quantity'][$key];
                         $otherInfoDetail->unit =$inputAllData['unit'][$key];
                         $otherInfoDetail->save();


                         OtherIngredient::where('name',$finalResult1)
               ->update([
                   'quantity' => $finalResult
                ]);

                }



            }





        }

        //end new code


   return redirect()->route('otherEquipment.index')->with('success','Added SuccessFully');


    }


    public function destroy($id){
        if (is_null($this->user) || !$this->user->can('otherEquipmentDelete')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete !');
        }


        OtherEquipment::destroy($id);
        return redirect()->route('otherEquipment.index')->with('error','Deleted successfully!');

    }
}
