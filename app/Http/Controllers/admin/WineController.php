<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\user\wine;
use App\Model\user\wine_category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $wines = wine::all();
        return view('admin.wines.show',compact('wines'));
    }

    public function create()
    {
        $categories = wine_category::all();
        return view('admin.wines.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'description' => 'required',
            'price' => 'required',
            'whatsapp_text' => 'required',
            'name'=>'required|unique:wines',
        ]);

        $wine = new wine();
        $wine->name = $request->name;
        $wine->price = $request->price;
        $wine->slug = Str::slug($request->name);
        $wine->body = $request->description;
        $wine->keywords = $request->name .' '. strip_tags(trim($request->description));
        $wine->text = $request->whatsapp_text;
        $wine->status = $request->status;
        $wine->featured = $request->feature;

        if($request->hasFile('image'))
        {
            $wine->image = $request->image->store('public/files/wines');
        }

        $wine->save();
        $wine->categories()->sync($request->categories);
        return redirect()->back()->with('success','wine created successfully');
    }

    public function edit($id)
    {
        $categories = wine_category::all();
        $wine = wine::where('id', $id)->first();
        return view('admin.wines.edit', compact('wine','categories'));
    }

    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'description' => 'required',
            'price' => 'required',
            'whatsapp_text' => 'required',
            'name'=>'required',
        ]);

        $wine = wine::find($id);
        $wine->name = $request->name;
        $wine->price = $request->price;
        $wine->slug = Str::slug($request->name);
        $wine->body = $request->description;
        $wine->keywords = $request->name .' '. strip_tags(trim($request->description));
        $wine->text = $request->whatsapp_text;
        $wine->status = $request->status;
        $wine->featured = $request->feature;

        if($request->hasFile('image'))
        {
            $current_image = 'storage/files/wines/'.substr($wine->image,19);
            //delete old banner first
            if(file_exists($current_image))
            {
                unlink($current_image);
            }
            $wine->image = $request->image->store('public/files/wines');
        }

        $wine->save();
        $wine->categories()->sync($request->categories);
        return redirect()->back()->with('success','Product updated successfully');
    }

    public function destroy($id)
    {
        //
        $wine = wine::find($id);
        $current_image = 'storage/files/wines/'.substr($wine->image,19);

        //delete old banner first
        if(file_exists($current_image))
        {
            unlink($current_image);
        }
        wine::where('id',$id)->delete();
        return redirect()->back()->with('success','wine deleted successfully');

    }
}
