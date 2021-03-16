<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\user\extra;
use App\Model\user\extra_category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExtraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $extras = extra::all();
        return view('admin.extras.show',compact('extras'));
    }

    public function create()
    {
        $categories = extra_category::all();
        return view('admin.extras.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'description' => 'required',
            'price' => 'required',
            'whatsapp_text' => 'required',
            'name'=>'required|unique:extras',
        ]);

        $extra = new extra();
        $extra->name = $request->name;
        $extra->price = $request->price;
        $extra->slug = Str::slug($request->name);
        $extra->body = $request->description;
        $extra->keywords = $request->name .' '. strip_tags(trim($request->description));
        $extra->text = $request->whatsapp_text;
        $extra->status = $request->status;
        $extra->featured = $request->feature;

        if($request->hasFile('image'))
        {
            $extra->image = $request->image->store('public/files/extras');
        }

        $extra->save();
        $extra->categories()->sync($request->categories);
        return redirect()->back()->with('success','product created successfully');
    }

    public function edit($id)
    {
        $categories = extra_category::all();
        $extra = extra::where('id', $id)->first();
        return view('admin.extras.edit', compact('extra','categories'));
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

        $extra = extra::find($id);
        $extra->name = $request->name;
        $extra->price = $request->price;
        $extra->slug = Str::slug($request->name);
        $extra->body = $request->description;
        $extra->keywords = $request->name .' '. strip_tags(trim($request->description));
        $extra->text = $request->whatsapp_text;
        $extra->status = $request->status;
        $extra->featured = $request->feature;

        if($request->hasFile('image'))
        {
            $current_image = 'storage/files/extras/'.substr($extra->image,20);
            //delete old banner first
            if(file_exists($current_image))
            {
                unlink($current_image);
            }
            $extra->image = $request->image->store('public/files/extras');
        }

        $extra->save();
        $extra->categories()->sync($request->categories);
        return redirect()->back()->with('success','Product updated successfully');
    }

    public function destroy($id)
    {
        //
        $extra = extra::find($id);
        $current_image = 'storage/files/extras/'.substr($extra->image,20);

        //delete old banner first
        if(file_exists($current_image))
        {
            unlink($current_image);
        }
        extra::where('id',$id)->delete();
        return redirect()->back()->with('success','Product deleted successfully');

    }

}
