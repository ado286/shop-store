<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    //
    public function index(){

        $role = Role::pluck('name', 'id');
        $users = User::all();

        return view('admin.users.index', ['users'=>$users, 'roles'=>$role]);
    }
    public function update(Request $request, $id){

        User::findOrFail($id)->update($request->all());

        return redirect()->back();

    }



    public function destroy($id){
        User::findOrFail($id)->delete();
        return redirect()->back();
    }
}
