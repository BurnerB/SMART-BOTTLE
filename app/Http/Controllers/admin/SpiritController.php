<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\user\spirit;
use App\Model\user\spirit_category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SpiritController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $spirits = spirit::all();
        return view('admin.spirits.show',compact('spirits'));
    }

    public function create()
    {
        $categories = spirit_category::all();
        return view('admin.spirits.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'description' => 'required',
            'price' => 'required',
            'whatsapp_text' => 'required',
            'name'=>'required|unique:spirits',
        ]);

        $spirit = new spirit();
        $spirit->name = $request->name;
        $spirit->price = $request->price;
        $spirit->slug = Str::slug($request->name);
        $spirit->body = $request->description;
        $spirit->keywords = $request->name .' '. strip_tags(trim($request->description));
        $spirit->text = $request->whatsapp_text;
        $spirit->status = $request->status;
        $spirit->featured = $request->feature;

        if($request->hasFile('image'))
        {
            $spirit->image = $request->image->store('public/files/spirits');
        }

        $spirit->save();
        $spirit->categories()->sync($request->categories);
        return redirect()->back()->with('success','Spirit created successfully');
    }

    public function edit($id)
    {
        $categories = spirit_category::all();
        $spirit = spirit::where('id', $id)->first();
        return view('admin.spirits.edit', compact('spirit','categories'));
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

        $spirit = spirit::find($id);
        $spirit->name = $request->name;
        $spirit->price = $request->price;
        $spirit->slug = Str::slug($request->name);
        $spirit->body = $request->description;
        $spirit->keywords = $request->name .' '. strip_tags(trim($request->description));
        $spirit->text = $request->whatsapp_text;
        $spirit->status = $request->status;
        $spirit->featured = $request->feature;

        if($request->hasFile('image'))
        {
            $current_image = 'storage/files/spirits/'.substr($spirit->image,21);
            //delete old banner first
            if(file_exists($current_image))
            {
                unlink($current_image);
            }
            $spirit->image = $request->image->store('public/files/spirits');
        }

        $spirit->save();
        $spirit->categories()->sync($request->categories);
        return redirect()->back()->with('success','Product updated successfully');
    }

    public function destroy($id)
    {
        //
        $spirit = spirit::find($id);
        $current_image = 'storage/files/spirits/'.substr($spirit->image,21);

        //delete old banner first
        if(file_exists($current_image))
        {
            unlink($current_image);
        }
        spirit::where('id',$id)->delete();
        return redirect()->back()->with('success','Spirit deleted successfully');

    }
}
