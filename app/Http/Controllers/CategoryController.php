<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use DateTime;
use DB;

class CategoryController extends Controller
{
    public function index()
    {
        $category = DB::table('categories')->get();
        return view('admin.categories.index', compact('category'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'category_id' => 'required',
        //     'code' => 'required',
        //     'price' => 'required',
        //     'stock' => 'required',
        //     'model' => 'required',
        //     'brand_name' => 'required',
        //     'description' => 'required',
        //     'color' => 'required',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        $data = array();
        $data['name'] = $request->input('name');
        $data['created_at'] = now();
        $data['updated_at'] = now();

        $category = DB::table('categories')->insert($data);
        return redirect()->route('admin.categories.index')
            ->with('success', 'Category Created Successfully');
    }

    public function edit($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'category_id' => 'required',
        //     'code' => 'required',
        //     'price' => 'required',
        //     'stock' => 'required',
        //     'model' => 'required',
        //     'brand_name' => 'required',
        //     'description' => 'required',
        //     'color' => 'required',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        $data = array();
        $data['name'] = $request->input('name');
        $data['created_at'] = now();
        $data['updated_at'] = now();

        $category = DB::table('categories')->where('id', $id)->update($data);
        return redirect()->route('admin.categories.index')
            ->with('success', 'Category Updated Successfully');
    }

    public function show(Request $request, $id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        $product = Product::where('category_id', $id)->get();
        // $product = Product::all();
        return view('admin.categories.show', compact('category', 'product'));
    }

    public function delete($id)
    {
        $category = DB::table('categories')->where('id', $id)->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Item has been successfully deleted!');
    }
}