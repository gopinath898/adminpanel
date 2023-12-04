<?php

namespace App\Http\Controllers;

use App\Models\Abouts;
use Illuminate\Http\Request;

class Aboutuscontroller extends Controller
{
    public function index()
    {
        $aboutUs = Abouts::all();
        return view('admin.aboutus', compact('aboutUs'));
    }

    public function store(Request $request)
    {

        $aboutus = new Abouts;
        $aboutus->title = $request->input('title');
        $aboutus->subtitle = $request->input('subtitle');
        $aboutus->description = $request->input('description');
        $aboutus->save();
        return redirect('/aboutus')->with('status', 'Data added for About Us');
    }

    public function edit($id)
    {
        $aboutItem = Abouts::findOrFail($id);
        return view('admin.aboutEdit')->with('aboutItem', $aboutItem);
    }

    public function update(Request $request, $id)
    {
        $about = Abouts::find($id);
        $about->title = $request->input('title');
        $about->subtitle = $request->input('subtitle');
        $about->description = $request->input('description');
        $about->update();
        return redirect()->back()->with('status', 'Your Data is Updated');
    }

    public function delete($id)
    {
        $about = Abouts::findOrFail($id);
        $about->delete();
        return redirect()->back()->with('status', 'Your Data is Deleted');
    }
}
