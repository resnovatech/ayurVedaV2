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
use App\Models\FacePack;
use App\Models\FacePackDetail;
class FacePackController extends Controller
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


        if (is_null($this->user) || !$this->user->can('facePackView')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

          $facialPackLists = FacePack::latest()->get();

$therapyIngredients =FacialPack::latest()->get();

               return view('admin.facePackLists.index',compact('facialPackLists','therapyIngredients'));
           }


           public function edit($id){


            if (is_null($this->user) || !$this->user->can('facePackUpdate')) {
                abort(403, 'Sorry !! You are Unauthorized to View !');
                   }

              $facialPackLists = FacePack::find($id);

    $therapyIngredients =FacialPack::latest()->get();

                   return view('admin.facePackLists.edit',compact('facialPackLists','therapyIngredients'));
               }



           public function store(Request $request){

            if (is_null($this->user) || !$this->user->can('facePackAdd')) {
                abort(403, 'Sorry !! You are Unauthorized to Add !');
            }

            $request->validate([
                'name' => 'required',
                'amount' => 'required',
                'therapy_ingredient_id.*' => 'required',
              ]);







             $inputAllData = $request->all();

//dd($inputAllData);

             $insertTherapyList = new FacePack();
             $insertTherapyList->pack_name = $request->name;
             $insertTherapyList->amount = $request->amount;
             $insertTherapyList->save();

             $therapyId = $insertTherapyList->id;

             $therapyIngredientId = $inputAllData['therapy_ingredient_id'];



             if (array_key_exists("therapy_ingredient_id", $inputAllData)){

                foreach($therapyIngredientId as $key => $therapyIngredientId){
                 $therapyDetail= new FacePackDetail();
                 $therapyDetail->pack_detail_id =$inputAllData['therapy_ingredient_id'][$key];
                 $therapyDetail->main_pack_id   = $therapyId;
                 $therapyDetail->save();

                }
                }



    return redirect()->route('facePackInfoList.index')->with('success','Added successfully!');



        }

        public function update(Request $request,$id){

            if (is_null($this->user) || !$this->user->can('facialInfoListUpdate')) {
                abort(403, 'Sorry !! You are Unauthorized to Update !');
            }

 //dd($request->all());

             $inputAllData = $request->all();



             $insertTherapyList =FacePack::find($id);
             $insertTherapyList->pack_name = $request->name;
             $insertTherapyList->amount = $request->amount;
             $insertTherapyList->save();

             $therapyId = $insertTherapyList->id;

             $therapyIngredientId = $inputAllData['therapy_ingredient_id'];



             if (array_key_exists("therapy_ingredient_id", $inputAllData)){


                $deletePreviousData = FacePackDetail::where('main_pack_id',$therapyId)->delete();


                foreach($therapyIngredientId as $key => $therapyIngredientId){

                    $therapyDetail= new FacePackDetail();
                 $therapyDetail->pack_detail_id =$inputAllData['therapy_ingredient_id'][$key];
                 $therapyDetail->main_pack_id   = $therapyId;
                     $therapyDetail->save();

                }
                }




    return redirect()->route('facePackInfoList.index')->with('success','Updated successfully!');



        }

        public function destroy($id)
        {

            if (is_null($this->user) || !$this->user->can('facialInfoListDelete')) {
                abort(403, 'Sorry !! You are Unauthorized to Delete !');
            }


            FacePack::destroy($id);
            return redirect()->route('facePackInfoList.index')->with('error','Deleted successfully!');
        }
}
