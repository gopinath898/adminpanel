<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use App\Models\Abouts;


class Dashboardcontroller extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.adminregister', ['users' => $users]);
    }
    public function about()
    {
        // Fetch the services
        $services = ServiceCategory::all();

        // Fetch abouts data
        $abouts = Abouts::all();

        // Fetch abouts data
        $users = User::all();

        // Pass both $services and $abouts to the view
        return view('admin.dashboard', compact('services', 'abouts','users'));
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
        return redirect('adminregister')->with('status', 'Your Data is Updated');
    }
    public function delete($id)
    {

        $users = User::findOrFail($id);
        $users->delete();

        return redirect()->back()->with('status', 'Your Data is deleted ');
    }
}