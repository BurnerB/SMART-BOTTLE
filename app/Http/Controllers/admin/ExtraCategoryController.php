<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\user\extra_category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExtraCategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
        $categories = extra_category::all();
        return view('admin.extra_category.show', compact('categories'));
    }

    public function create()
    {
        return view('admin.extra_category.category');
    }

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|unique:extra_categories'
        ]);

        $category = new extra_category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        $category->save();
        return (redirect()->back()->with('success', 'extra category saved successfully'));
    }

    public function edit($id)
    {
        $category = extra_category::where('id', $id)->first();
        return view('admin.extra_category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category = extra_category::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect()->back()->with('success', 'Update was successful');
    }


    public function destroy($id)
    {
        //
        extra_category::where('id', $id)->delete();
        return redirect()->back()->with('success', 'extra category deleted successfully');
    }
}
