<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use App\Models\ServiceList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ServiceListController extends Controller
{
    public function index()
    {

        $services = ServiceCategory::all();
        $serviceList = ServiceList::all();
        return view('admin.service-list.index', compact('services','serviceList'));
    }
    public function edit($id)
    {
        $serviceList = ServiceList::find($id);
        $services = ServiceCategory::all();
        return view('admin.service-list.edit', compact('services','serviceList'));
    }

    public function store(Request $request)
    {

        $serviceList = new ServiceList();
        $serviceList->serv_cate_id= $request->input('serv_cate_id');
        $serviceList->title= $request->input('title');
        $serviceList->description= $request->input('description');
        $serviceList->price= $request->input('price');
        $serviceList->duration= $request->input('duration');
        $serviceList->save();

        Session::flash('statuscode', 'success');
        return redirect('/service-list')->with('status', 'Service List Added Successfully');
    }


    public function update(Request $request, $id)
    {
        $serviceList = ServiceList::find($id);
        $serviceList->serv_cate_id= $request->input('serv_cate_id');
        $serviceList->title= $request->input('title');
        $serviceList->description= $request->input('description');
        $serviceList->price= $request->input('price');
        $serviceList->duration= $request->input('duration');
        $serviceList->save();
        return redirect('/service-list')->with('status', 'Your Data is Updated');
    }

    public function delete($id)
    {
        $serviceList = ServiceList::findOrFail($id);
        $serviceList->delete();
        return redirect()->back()->with('status', 'Service List is Deleted');
    }
}
