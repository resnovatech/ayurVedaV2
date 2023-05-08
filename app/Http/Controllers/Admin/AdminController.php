<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{


    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }



    public function index()
    {

        if (is_null($this->user) || !$this->user->can('userView')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

        $users = Admin::all();
        $roles  = Role::all();

       return view('admin.user.index', compact('users','roles'));
    }


    public function store(Request $request)
    {

        if (is_null($this->user) || !$this->user->can('userAdd')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

        // Validation Data
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|max:100|email|unique:admins',
            'password' => 'required|min:8|confirmed',
        ]);

        // Create New User
        $admins = new Admin();
        $admins->name = $request->name;
        $admins->position = $request->position;
        $admins->phone = $request->phone;
        $admins->email = $request->email;
        $admins->password = Hash::make($request->password);

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $admins->image =  'public/uploads/'.$filename;

        }


        $admins->save();

        if ($request->roles) {
            $admins->assignRole($request->roles);
        }


        return redirect()->route('user.index')->with('success','Created successfully!');
    }


    public function update(Request $request,$id)
    {

        if (is_null($this->user) || !$this->user->can('userUpdate')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

        // Create New User
        $admins = Admin::find($id);
        $admins->name = $request->name;
        $admins->position = $request->position;
        $admins->phone = $request->phone;
        $admins->email = $request->email;
        if ($request->password) {
            $admins->password = Hash::make($request->password);
        }

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $admins->image =  'public/uploads/'.$filename;

        }


        $admins->save();

        $admins->roles()->detach();
        if ($request->roles) {
            $admins->assignRole($request->roles);
        }


        return redirect()->route('user.index')->with('success','Updated successfully!');;
    }


    public function destroy($id)
    {

        if (is_null($this->user) || !$this->user->can('userDelete')) {
            abort(403, 'Sorry !! You are Unauthorized to View !');
               }

        $admins = Admin::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return redirect()->route('user.index')->with('error','Deleted successfully!');
    }
}
