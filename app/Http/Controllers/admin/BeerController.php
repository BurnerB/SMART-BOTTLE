<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\user\beer_category;
use Illuminate\Http\Request;
use App\Model\user\beer;
use Illuminate\Support\Str;

class BeerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $beers = beer::all();
        return view('admin.beers.show',compact('beers'));
    }

    public function create()
    {
        $categories = beer_category::all();
        return view('admin.beers.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'description' => 'required',
            'price' => 'required',
            'whatsapp_text' => 'required',
            'name'=>'required|unique:beers',
        ]);

        $beer = new beer();
        $beer->name = $request->name;
        $beer->price = $request->price;
        $beer->slug = Str::slug($request->name);
        $beer->body = $request->description;
        $beer->keywords = $request->name .' '. strip_tags(trim($request->description));
        $beer->text = $request->whatsapp_text;
        $beer->status = $request->status;
        $beer->featured = $request->feature;

        if($request->hasFile('image'))
        {
            $beer->image = $request->image->store('public/files/beers');
        }

        $beer->save();
        $beer->categories()->sync($request->categories);
        return redirect()->back()->with('success','beer created successfully');
    }

    public function edit($id)
    {
        $categories = beer_category::all();
        $beer = beer::where('id', $id)->first();
        return view('admin.beers.edit', compact('beer','categories'));
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

        $beer = beer::find($id);
        $beer->name = $request->name;
        $beer->price = $request->price;
        $beer->slug = Str::slug($request->name);
        $beer->body = $request->description;
        $beer->keywords = $request->name .' '. strip_tags(trim($request->description));
        $beer->text = $request->whatsapp_text;
        $beer->status = $request->status;
        $beer->featured = $request->feature;


        if($request->hasFile('image'))
        {
            $current_image = 'storage/files/beers/'.substr($beer->image,19);
            //delete old banner first
            if(file_exists($current_image))
            {
                unlink($current_image);
            }
            $beer->image = $request->image->store('public/files/beers');
        }

        $beer->save();
        $beer->categories()->sync($request->categories);
        return redirect()->back()->with('success','Product updated successfully');
    }

    public function destroy($id)
    {
        //
        $beer = beer::find($id);
        $current_image = 'storage/files/beers/'.substr($beer->image,19);

        //delete old banner first
        if(file_exists($current_image))
        {
            unlink($current_image);
        }
        beer::where('id',$id)->delete();
        return redirect()->back()->with('success','Beer deleted successfully');

    }


}
