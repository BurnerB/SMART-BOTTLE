<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\user\spirit_category;
use Illuminate\Support\Str;

class SpiritCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
        $categories = spirit_category::all();
        return view('admin.spirit_category.show', compact('categories'));
    }

    public function create()
    {
        return view('admin.spirit_category.category');
    }

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|unique:spirit_categories'
        ]);

        $category = new spirit_category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        $category->save();
        return (redirect()->back()->with('success', 'spirit category saved successfully'));
    }

    public function edit($id)
    {
        $category = spirit_category::where('id', $id)->first();
        return view('admin.spirit_category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category = spirit_category::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect()->back()->with('success', 'Update was successful');
    }


    public function destroy($id)
    {
        //
        spirit_category::where('id', $id)->delete();
        return redirect()->back()->with('success', 'spirit category deleted successfully');
    }
}
