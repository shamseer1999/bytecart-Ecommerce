<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $data['userCount']=User::get()->count();
        return view('dashbord',$data);
    }
    public function users()
    {
        $data['results']=User::with(['roles'])->orderBy('id','DESC')->paginate(10);

        return view('user.index',$data);
    }
    public function add(Request $request)
    {
        if($request->isMethod('post'))
        {
            $validated=$request->validate([
                'name' =>'required',
                'email'=>'required|unique:users,email',
                'role' =>'required',
                'password' =>'required'
            ]);

            $ins_arr=array(
                'name'=>$validated['name'],
                'email'=>$validated['email'],
                'password'=>bcrypt($validated['password']),
                'role_id'=>$validated['role']
            );

            $user =User::create($ins_arr);


            return redirect()->route('users')->with('success','User registerd successfully');

        }
        $data['roles']=Role::get();
        
        return view('user.add',$data);
    }
    public function edit(Request $request,$id)
    {
        $user_id=decrypt($id);

        $editdata=User::find($user_id);

        if($request->isMethod('post'))
        {
            $validated=$request->validate([
                'name' =>'required',
                'role' =>'required'
            ]);

            $editdata->name = $validated['name'];
            $editdata->role_id = $validated['role'];
            $editdata->save();

            return redirect()->route('users')->with('success','User updated successfully');

        }

        $data['roles']=Role::get();
        $data['edit_data']=$editdata;
        
        return view('user.edit',$data);
    }

    public function disable_user($id)
    {
        $user_id=decrypt($id);

        $editdata=User::find($user_id);

        $editdata->status = 2;
        $editdata->save();

        return redirect()->route('users')->with('success','User disabled successfully');
    }

    public function enable_user($id)
    {
        $user_id=decrypt($id);

        $editdata=User::find($user_id);

        $editdata->status = 1;
        $editdata->save();

        return redirect()->route('users')->with('success','User enabled successfully');
    }

    public function delete_user($id)
    {
        $user_id=decrypt($id);

        User::find($user_id)->delete();

        return redirect()->route('users')->with('success','User deleted successfully');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
