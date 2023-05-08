<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
class PermissionController extends Controller
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

        if (is_null($this->user) || !$this->user->can('permissionView')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }


        $pers = DB::table('permissions')->select('group_name')->groupBy('group_name')->get();
        return view('admin.permission.index',compact('pers'));
    }


    public function store(Request $request){


        if (is_null($this->user) || !$this->user->can('permissionAdd')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }


        $request->validate([
            'name.*' => 'required|string',
            'group_name' => 'required|string',
        ]);


                $number=count($request->name);

                if($number >0){
                    for($i=0;$i<$number;$i++){
                        $data=array([
                            'name'=>$request->name[$i],
                             'guard_name'=>'admin',
                             'group_name'=>$request->group_name
                        ]);

                      Permission::insert($data);
                    }


                return redirect()->back()->with('success','Created successfully!');

                }
        }



        public function update(Request $request,$id){

            if (is_null($this->user) || !$this->user->can('permissionUpdate')) {
                abort(403, 'Sorry !! You are Unauthorized to View !');
                   }

            Permission::where('group_name', $request->group_name)->delete();

            $number=count($request->name);

            if($number >0){
                for($i=0;$i<$number;$i++){
                    $data=array([
                        'name'=>$request->name[$i],
                         'guard_name'=>'admin',
                         'group_name'=>$request->group_name
                    ]);

                  Permission::insert($data);
                }

            }

            return redirect()->back()->with('success','Created successfully!');
        }



        public function destroy($id)
        {

            if (is_null($this->user) || !$this->user->can('permissionDelete')) {
                abort(403, 'Sorry !! You are Unauthorized to View !');
                   }


            $getGroupName = DB::table('permissions')
            ->where('id',$id)
            ->value('group_name');

            Permission::where('group_name', $getGroupName)->delete();
            return redirect()->back()->with('error','Deleted successfully!');
        }
}
