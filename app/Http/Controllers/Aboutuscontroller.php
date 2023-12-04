<?php

namespace App\Http\Controllers;

use App\Models\Abouts;
use Illuminate\Http\Request;

class Aboutuscontroller extends Controller
{
    public function index(){
        return view ('admin.aboutus');
    }
    public function store(Request $request){
       
        $aboutus = new Abouts;

        // dd($abouts);

        $aboutus->title = $request->input ('title');
        $aboutus->subtitle = $request->input ('subtitle');
        $aboutus->description = $request->input ('description');
        $aboutus->save();
        return redirect ('/aboutus')->with('status', 'Data added for About Us');
    }
}
