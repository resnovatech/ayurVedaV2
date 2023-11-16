<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\TherapyIngredient;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Warehouse;
class TherapyIngredientController extends Controller
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


        if (is_null($this->user) || !$this->user->can('therapyIngredientsAdd')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

          $therapyIngredients = TherapyIngredient::latest()->get();



               return view('admin.therapyIngredients.index',compact('therapyIngredients'));
           }


           public function store(Request $request){

            if (is_null($this->user) || !$this->user->can('therapyIngredientsAdd')) {
                abort(403, 'Sorry !! You are Unauthorized to Add !');
            }

            $request->validate([
                'name' => 'required',

              ]);




             $input = $request->all();

             TherapyIngredient::create($input);




    return redirect()->route('therapyIngredients.index')->with('success','Added successfully!');



        }





        public function update(Request $request,$id){

            if (is_null($this->user) || !$this->user->can('therapyIngredientsUpdate')) {
                abort(403, 'Sorry !! You are Unauthorized to Update !');
            }

            $medicine = TherapyIngredient::findOrFail($id);

            $input = $request->all();

            $medicine->fill($input)->save();


            $newUpdateData= DB::table('therapy_ingredients')->where('id',$id)
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


        public function destroy($id)
    {

        if (is_null($this->user) || !$this->user->can('therapyIngredientsDelete')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete !');
        }


        TherapyIngredient::destroy($id);
        return redirect()->route('therapyIngredients.index')->with('error','Deleted successfully!');
    }
}
