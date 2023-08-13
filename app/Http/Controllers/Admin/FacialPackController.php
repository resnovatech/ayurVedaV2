<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
use App\Models\FacialPack;
use App\Models\FacialPackDetail;
use App\Models\OtherIngredient;
class FacialPackController extends Controller
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


        if (is_null($this->user) || !$this->user->can('facialInfoListView')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

          $facialPackLists = FacialPack::latest()->get();

$therapyIngredients =OtherIngredient::latest()->get();

               return view('admin.facialPackLists.index',compact('facialPackLists','therapyIngredients'));
           }


       public function edit($id){


            if (is_null($this->user) || !$this->user->can('facialInfoListView')) {
                abort(403, 'Sorry !! You are Unauthorized to View !');
                   }

              $facialPackLists = FacialPack::find($id);

    $therapyIngredients =OtherIngredient::latest()->get();

                   return view('admin.facialPackLists.edit',compact('facialPackLists','therapyIngredients'));
               }


           public function store(Request $request){

            if (is_null($this->user) || !$this->user->can('facialInfoListAdd')) {
                abort(403, 'Sorry !! You are Unauthorized to Add !');
            }

            $request->validate([
                'name' => 'required',
                'therapy_ingredient_id.*' => 'required',
                'quantity.*' => 'required',
              ]);







             $inputAllData = $request->all();

//dd($inputAllData);

             $insertTherapyList = new FacialPack();
             $insertTherapyList->pack_name = $request->name;
             $insertTherapyList->save();

             $therapyId = $insertTherapyList->id;

             $therapyIngredientId = $inputAllData['therapy_ingredient_id'];



             if (array_key_exists("therapy_ingredient_id", $inputAllData)){

                foreach($therapyIngredientId as $key => $therapyIngredientId){
                 $therapyDetail= new FacialPackDetail();
                 $therapyDetail->ingredient_id =$inputAllData['therapy_ingredient_id'][$key];
                 $therapyDetail->amount=$inputAllData['quantity'][$key];
                 $therapyDetail->face_pack_id   = $therapyId;
                 $therapyDetail->save();

                }
                }



    return redirect()->route('facialInfoList.index')->with('success','Added successfully!');



        }

        public function update(Request $request,$id){

            if (is_null($this->user) || !$this->user->can('facialInfoListUpdate')) {
                abort(403, 'Sorry !! You are Unauthorized to Update !');
            }

 //dd($request->all());

             $inputAllData = $request->all();



             $insertTherapyList =FacialPack::find($id);
             $insertTherapyList->pack_name = $request->name;
             $insertTherapyList->save();

             $therapyId = $insertTherapyList->id;

             $therapyIngredientId = $inputAllData['therapy_ingredient_id'];



             if (array_key_exists("therapy_ingredient_id", $inputAllData)){


                $deletePreviousData = FacialPackDetail::where('face_pack_id',$therapyId)->delete();


                foreach($therapyIngredientId as $key => $therapyIngredientId){
                    $therapyDetail= new FacialPackDetail();
                    $therapyDetail->ingredient_id =$inputAllData['therapy_ingredient_id'][$key];
                    $therapyDetail->amount=$inputAllData['quantity'][$key];
                    $therapyDetail->face_pack_id   = $therapyId;
                     $therapyDetail->save();

                }
                }




    return redirect()->route('facialInfoList.index')->with('success','Updated successfully!');



        }

        public function destroy($id)
        {

            if (is_null($this->user) || !$this->user->can('facialInfoListDelete')) {
                abort(403, 'Sorry !! You are Unauthorized to Delete !');
            }


            FacialPack::destroy($id);
            return redirect()->route('facialInfoList.index')->with('error','Deleted successfully!');
        }

}
