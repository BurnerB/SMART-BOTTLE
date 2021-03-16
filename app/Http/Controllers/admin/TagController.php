<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\user\tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $tags = tag::all();
        return view('admin.tag.show', compact('tags'));
    }

    public function create()
    {
        if (Auth::user()->can('tags.create')) {
            return view('admin.tag.tag');
        }
        $message = "add new tags";
        return view('admin.unauthorised', compact('message'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required | unique:tags'
        ]);

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        $tag->save();
        return (redirect()->back()->with('success', 'Tag added successfully'));
    }


    public function edit($id)
    {
        if (Auth::user()->can('tags.update')) {
            $tag = tag::where('id', $id)->first();
            return view('admin.tag.edit', compact('tag'));
        }
        $message = "add new tags";
        return view('admin.unauthorised', compact('message'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $tag = tag::find($id);
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name);
        $tag->save();
        return (redirect()->back()->with('success', 'Tag updated successfully'));
    }


    public function destroy($id)
    {
        if (Auth::user()->can('tags.delete')) {
            tag::where('id', $id)->delete();
            return redirect()->back()->with('success', 'Tag deleted successfully');
        }

        $message = "add new tags";
        return view('admin.unauthorised', compact('message'));
    }
}
