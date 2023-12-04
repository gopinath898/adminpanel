<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Dashboardcontroller extends Controller
{
    public function index(){
        $users = User::all();
        
        return view('admin.adminregister', ['users' => $users]);
    }
    public function edit(Request $request,$id){
        $users = User::findOrFail($id);
        // dd($users);
        return view('admin.registeredit')->with('users',$users);
    }
    public function update(Request $request,$id){
        $users = User::find($id);
        $users->name = $request->input('username');
        $users->usertype = $request->input('usertype');
        $users->update();
        return redirect('/adminregister')->with('status','your data is Updated');
}
    public function delete ($id) {

    $users = User::findOrFail($id);
    $users->delete();

    return redirect('/adminregister')->with('status','your data is deleted ');

}
}



