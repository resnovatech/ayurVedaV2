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
use App\Models\Warehouse;
use DB;
use Carbon\Carbon;
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


    public function getDataForQuantity(Request $request){

        $mainData = DB::table('therapy_ing_detail')->where('main_name',$request->getTheValue)->get();

        $data = view('admin.inventory.getDataForQuantity',compact('mainData'))->render();
            return response()->json($data);

    }


    public function checkwareHousequantity(Request $request){

        $mainData = DB::table('warhouses')->where('name',$request->getTheValue)->value('quantity');


        if(empty($mainData)){

            $resultData =  0 ;

        }else{

            $resultData =   $mainData;

        }

        return response()->json($resultData);

    }


    public function store(Request $request){

       // dd($request->all());
        $input = $request->all();


         //new code for update data
         $getWareHouseQuantity = Warehouse::where('name',$request->name)->value('quantity');
         $newDataW = $getWareHouseQuantity - $request->quantity;

         Warehouse::where('name',$request->name)
         ->update([
             'quantity' => $newDataW
          ]);


         //new code for update data



        if($request->category == 'Medicine Equipment'){




            $getPreviousQuantity = MedicineEquipment::where('name',$request->name)->value('quantity');

            if(empty($getPreviousQuantity)){

                  MedicineEquipment::create($input);




            }else{

                $newData = $request->quantity + $getPreviousQuantity;

                MedicineEquipment::where('name',$request->name)
       ->update([
           'quantity' => $newData
        ]);


            }



            //new code for ingredient

            if($request->getData == 0){


            }else{

                //DB::table('therapy_ing_detail')->where('id',$request->mainId)->delete();

                 $arr_all = implode(",",$request->updateQuantity);
                 $arr_allOne = implode(",",$request->updateUnit);

                   $inputAllData = $request->all();

                $ing_name = $inputAllData['updateName'];


                foreach($ing_name as $k=>$ing_names){


                    DB::table('therapy_ing_detail')->where('id',$inputAllData['mainId'][$k])->insert([
                        'cat_name' => $request->category,
                   'main_name' => $inputAllData['mainName'][$k],
                   'name' => $inputAllData['updateName'][$k],
                   'quantity' => $inputAllData['updateQuantity'][$k],
                   'unit' => $inputAllData['updateUnit'][$k],
                   'created_at' => Carbon::now(),
                   'updated_at' => Carbon::now()
                  ]);



                   //new code for update data
         $getWareHouseQuantity1 = Warehouse::where('name',$inputAllData['updateName'][$k])->value('quantity');
         $newDataW1 = $getWareHouseQuantity1 - $inputAllData['updateQuantity'][$k];

         Warehouse::where('name',$inputAllData['updateName'][$k])
         ->update([
             'quantity' => $newDataW1
          ]);


         //new code for update data



                }

            }


            //new code for ingredient



        }elseif($request->category == 'Thearpy Ingredient'){


             $getPreviousQuantity = TherapyIngredient::where('name',$request->name)->value('quantity');

            if(empty($getPreviousQuantity)){

                  TherapyIngredient::create($input);

            }else{

                $newData = $request->quantity + $getPreviousQuantity;

                TherapyIngredient::where('name',$request->name)
       ->update([
           'quantity' => $newData
        ]);


            }


              //new code for ingredient

            if($request->getData == 0){


            }else{

                //DB::table('therapy_ing_detail')->where('id',$request->mainId)->delete();

                 $arr_all = implode(",",$request->updateQuantity);
                 $arr_allOne = implode(",",$request->updateUnit);

                   $inputAllData = $request->all();

                $ing_name = $inputAllData['updateName'];


                foreach($ing_name as $k=>$ing_names){


                    DB::table('therapy_ing_detail')->where('id',$inputAllData['mainId'][$k])->insert([
                        'cat_name' => $request->category,
                   'main_name' => $inputAllData['mainName'][$k],
                   'name' => $inputAllData['updateName'][$k],
                   'quantity' => $inputAllData['updateQuantity'][$k],
                   'unit' => $inputAllData['updateUnit'][$k],
                   'created_at' => Carbon::now(),
                   'updated_at' => Carbon::now()
                  ]);


                               //new code for update data
         $getWareHouseQuantity1 = Warehouse::where('name',$inputAllData['updateName'][$k])->value('quantity');
         $newDataW1 = $getWareHouseQuantity1 - $inputAllData['updateQuantity'][$k];

         Warehouse::where('name',$inputAllData['updateName'][$k])
         ->update([
             'quantity' => $newDataW1
          ]);


         //new code for update data


                }

            }


            //new code for ingredient


        }else{

              $getPreviousQuantity = OtherIngredient::where('name',$request->name)->value('quantity');

            if(empty($getPreviousQuantity)){

                  OtherIngredient::create($input);

            }else{

                $newData = $request->quantity + $getPreviousQuantity;

                OtherIngredient::where('name',$request->name)
       ->update([
           'quantity' => $newData,
            'category' => $request->category
        ]);


            }


              //new code for ingredient

             if($request->getData == 0){


            }else{

                //DB::table('therapy_ing_detail')->where('id',$request->mainId)->delete();

                 $arr_all = implode(",",$request->updateQuantity);
                 $arr_allOne = implode(",",$request->updateUnit);

                   $inputAllData = $request->all();

                $ing_name = $inputAllData['updateName'];


                foreach($ing_name as $k=>$ing_names){


                    DB::table('therapy_ing_detail')->where('id',$inputAllData['mainId'][$k])->insert([
                        'cat_name' => $request->category,
                   'main_name' => $inputAllData['mainName'][$k],
                   'name' => $inputAllData['updateName'][$k],
                   'quantity' => $inputAllData['updateQuantity'][$k],
                   'unit' => $inputAllData['updateUnit'][$k],
                   'created_at' => Carbon::now(),
                   'updated_at' => Carbon::now()
                  ]);


                               //new code for update data
         $getWareHouseQuantity1 = Warehouse::where('name',$inputAllData['updateName'][$k])->value('quantity');
         $newDataW1 = $getWareHouseQuantity1 - $inputAllData['updateQuantity'][$k];

         Warehouse::where('name',$inputAllData['updateName'][$k])
         ->update([
             'quantity' => $newDataW1
          ]);


         //new code for update data
                }

            }


            //new code for ingredient


            //OtherIngredient::create($input);
        }

        return redirect()->back()->with('success','Added successfully!');
    }


    public function update(Request $request){

        //dd($request->all());

         $medicine = OtherIngredient::findOrFail($id);

            $input = $request->all();

            $medicine->fill($input)->save();





            $newUpdateData= DB::table('other_ingredients')->where('id',$id)
            ->value('name');

    $getWareHouseQuantity1 = Warehouse::where('name',$newUpdateData)->value('quantity');
    $newDataW1 = $getWareHouseQuantity1 - $request->quantity;

    Warehouse::where('name',$newUpdateData)
    ->update([
        'quantity' => $newDataW1
     ]);






             if($request->getData == 0){


            }else{


                   $inputAllData = $request->all();

                $ing_name = $inputAllData['mainId'];


                foreach($ing_name as $k=>$ing_names){


                    DB::table('therapy_ing_detail')->where('id',$inputAllData['mainId'][$k])->update([

                   'quantity' => $inputAllData['updateQuantity'][$k],
                   'unit' => $inputAllData['updateUnit'][$k],

                   'updated_at' => Carbon::now()
                  ]);



             //new code for update data

             $newUpdateData= DB::table('therapy_ing_detail')->where('id',$inputAllData['mainId'][$k])
                     ->value('name');

             $getWareHouseQuantity1 = Warehouse::where('name',$newUpdateData)->value('quantity');
             $newDataW1 = $getWareHouseQuantity1 - $inputAllData['updateQuantity'][$k];

             Warehouse::where('name',$newUpdateData)
             ->update([
                 'quantity' => $newDataW1
              ]);


             //new code for update data




                }


            }

    return redirect()->back()->with('success','Updated successfully!');
    }
}
