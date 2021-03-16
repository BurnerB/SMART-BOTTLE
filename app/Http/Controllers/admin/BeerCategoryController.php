<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\user\beer_category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeerCategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
        $categories = beer_category::all();
        return view('admin.beer_category.show', compact('categories'));
    }

    public function create()
    {
        return view('admin.beer_category.category');
    }

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|unique:beer_categories'
        ]);

        $category = new beer_category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        $category->save();
        return (redirect()->back()->with('success', 'beer category saved successfully'));
    }

    public function edit($id)
    {
        $category = beer_category::where('id', $id)->first();
        return view('admin.beer_category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category = beer_category::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect()->back()->with('success', 'Update was successful');
    }


    public function destroy($id)
    {
        //
        beer_category::where('id', $id)->delete();
        return redirect()->back()->with('success', 'beer category deleted successfully');
    }
}
