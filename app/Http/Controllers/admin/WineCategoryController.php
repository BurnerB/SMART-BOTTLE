<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\user\wine_category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class WineCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
        $categories = wine_category::all();
        return view('admin.wine_category.show', compact('categories'));
    }

    public function create()
    {
        return view('admin.wine_category.category');
    }

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|unique:wine_categories'
        ]);

        $category = new wine_category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        $category->save();
        return (redirect()->back()->with('success', 'Wine category saved successfully'));
    }

    public function edit($id)
    {
        $category = wine_category::where('id', $id)->first();
        return view('admin.wine_category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category = wine_category::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect()->back()->with('success', 'Update was successful');
    }


    public function destroy($id)
    {
        //
        wine_category::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Wine category deleted successfully');
    }
}
