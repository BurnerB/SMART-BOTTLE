<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\admin\service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ServiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
        $services = service::all();
        return view('admin.service.show',compact('services'));
    }

    public function create()
    {
        return view('admin.service.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'short_description' => 'required',
            'icon' => 'required',
            'name'=>'required|unique:services',
        ]);

        $service = new service();
        $service->name = $request->name;
        $service->slug = Str::slug($request->name);
        $service->short_description = $request->short_description;
        $service->description = $request->description;
        $service->icon = $request->icon;
        $service->status = $request->status;
        $service->meta_title = $request->meta_title;
        $service->meta_author = $request->meta_author;
        $service->meta_description = $request->meta_description;
        $service->meta_keywords = $request->meta_keywords;

        if($request->hasFile('image'))
        {
            $service->media = $request->image->store('public/files/services');
        }

        $service->save();
        return redirect()->back()->with('success','Service created successfully');
    }

    public function edit($id)
    {
        $service = service::where('id',$id)->first();
        return view('admin.service.edit',compact('service'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'short_description' => 'required',
            'icon' => 'required',
            'name'=>'required',
        ]);

        $service = service::find($id);
        $service->name = $request->name;
        $service->slug = Str::slug($request->name);
        $service->short_description = $request->short_description;
        $service->description = $request->description;
        $service->icon = $request->icon;
        $service->status = $request->status;
        $service->meta_title = $request->meta_title;
        $service->meta_author = $request->meta_author;
        $service->meta_description = $request->meta_description;
        $service->meta_keywords = $request->meta_keywords;

        if($request->hasFile('image'))
        {
            $current_image = 'storage/files/services/'.substr($service->media,22);

            //delete old service first
            if(file_exists($current_image))
            {
                unlink($current_image);
            }
            $service->media = $request->image->store('public/files/services');
        }

        $service->save();
        return redirect()->back()->with('success','Service updated successfully');
    }


    public function destroy($id)
    {
        $service = service::find($id);
        $current_image = 'storage/files/services/'.substr($service->media,22);

        //delete old service first
        if(file_exists($current_image))
        {
            unlink($current_image);
        }
        service::where('id',$id)->delete();
        return redirect()->back()->with('success','Service deleted successfully');
    }
}
