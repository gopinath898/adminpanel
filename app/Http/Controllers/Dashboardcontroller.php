<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Dashboardcontroller extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.adminregister', ['users' => $users]);
    }
    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('admin.registeredit')->with('users', $users);
    }
    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->input('username');
        $users->usertype = $request->input('usertype');
        $users->update();
        return redirect()->back()->with('status', 'Your Data is Updated');
    }
    public function delete($id)
    {

        $users = User::findOrFail($id);
        $users->delete();

        return redirect()->back()->with('status', 'Your Data is deleted ');
    }
}
