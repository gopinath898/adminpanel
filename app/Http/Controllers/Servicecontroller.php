<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class Servicecontroller extends Controller
{
    public function index(){ 

        $services = ServiceCategory::all();
        return view('admin.services.index')->with('services', $services);

    }
    public function edit($id)
    {
        $service_category = ServiceCategory::find($id);
        // dd($service_category);
        return view('admin.services.edit')->with('service_category', $service_category);
    }
    public function create(){ 

        return view('admin.services.create');

    }
    public function store(Request $request){ 

        $servicecategories = new ServiceCategory();
        $servicecategories->service_name = $request->input('service_name');
        $servicecategories->service_description = $request->input('service_description');
        $servicecategories->save();

        // dd( $servicecategories);
        
        Session::flash('statuscode', 'success');
        return redirect('/service-category')->with('status', 'Category Added Successfully');

    }

    
    public function update(Request $request, $id)
    {
        $serv_cat = ServiceCategory::find($id);
        $serv_cat->service_name = $request->input('service_name');
        $serv_cat->service_description = $request->input('service_description');
        $serv_cat->update();
        // dd($serv_cat);
        return redirect('/service-category')->with('status', 'Your Data is Updated');
    }
    
    public function delete($id)
    {
        $about = ServiceCategory::findOrFail($id);
        $about->delete();
        return redirect()->back()->with('status', 'service category is Deleted');
    }
}