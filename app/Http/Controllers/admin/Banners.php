<?php

namespace App\Http\Controllers\admin;

use App\admin\service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\banner;
use Illuminate\Support\Facades\Auth;

class Banners extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
        $banners = banner::all();
        return view('admin.banner.show',compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.create');

    }


    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'title'=>'required',
        ]);

        $banner = new banner();
        $banner->title = $request->title;
        $banner->short_title = $request->short_title;
        $banner->btn_text = $request->btn_text;
        $banner->btn_link = $request->btn_link;
        $banner->status = $request->status;

        if($request->hasFile('image'))
        {
            $banner->media = $request->image->store('public/files/banners');
        }

        $banner->save();
        return redirect()->back()->with('success','Banner created successfully');


    }


    public function edit($id)
    {

        $banner = banner::where('id',$id)->first();
        return view('admin.banner.edit',compact('banner'));

    }

    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'title'=>'required',
        ]);

        $banner = banner::find($id);
        $banner->title = $request->title;
        $banner->short_title = $request->short_title;
        $banner->btn_text = $request->btn_text;
        $banner->btn_link = $request->btn_link;
        $banner->status = $request->status;

        if($request->hasFile('image'))
        {
            $current_image = 'storage/files/banners/'.substr($banner->media,21);


            //delete old banner first
            if(file_exists($current_image))
            {
                unlink($current_image);
            }
            $banner->media = $request->image->store('public/files/banners');
        }

        $banner->save();
        return redirect()->back()->with('success','Banner updated successfully');
    }


    public function destroy($id)
    {
        //
        $banner = banner::find($id);
        $current_image = 'storage/files/banners/'.substr($banner->media,21);

        //delete old banner first
        if(file_exists($current_image))
        {
            unlink($current_image);
        }
        banner::where('id',$id)->delete();
        return redirect()->back()->with('success','Banner deleted successfully');

    }
}
