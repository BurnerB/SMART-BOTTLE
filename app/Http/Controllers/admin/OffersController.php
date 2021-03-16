<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\offer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OffersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $offers = offer::all();
        return view('admin.offer.show',compact('offers'));
    }


    public function create()
    {
        //
        return view('admin.offer.create');

    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'description' => 'required',
            'title'=>'required|unique:offers',
        ]);

        $offer = new offer();
        $offer->title = $request->title;
        $offer->description = $request->description;
        $offer->status = $request->status;
        $offer->btn_text = $request->btn_text;
        $offer->btn_link = $request->btn_link;

        if($request->hasFile('image'))
        {
            $offer->media = $request->image->store('public/files/offers');
        }

        $offer->save();
        return redirect()->back()->with('success','Offer created successfully');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $offer = offer::where('id',$id)->first();
        return view('admin.offer.edit',compact('offer'));
    }

    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'description' => 'required',
            'title'=>'required',
        ]);

        $offer = offer::find($id);
        $offer->title = $request->title;
        $offer->description = $request->description;
        $offer->status = $request->status;
        $offer->btn_text = $request->btn_text;
        $offer->btn_link = $request->btn_link;


        if($request->hasFile('image'))
        {
            $current_image = 'storage/files/offers/'.$offer->media;

            //delete old offer first
            if(file_exists($current_image))
            {
                unlink($current_image);
            }
            $offer->media = $request->image->store('public/files/offers');


        }

        $offer->save();
        return redirect()->back()->with('success','Offer updated successfully');
    }

    public function destroy($id)
    {
        $offer = offer::find($id);
        $current_image = 'storage/files/offers/'.$offer->media;

        //delete old offer first
        if(file_exists($current_image))
        {
            unlink($current_image);
        }
        offer::where('id',$id)->delete();
        return redirect()->back()->with('success','Offer deleted successfully');
    }
}
