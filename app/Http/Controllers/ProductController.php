<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use DateTime;
use DB;

class ProductController extends Controller
{

    public function dashboard()
    {
        return view('admin.sidebar');
    }

    public function index()
    {
        $product = DB::table('products')->get();
        $categories = Category::all()->pluck('name', 'id');
        // $product = Product::all();
        // dd($product);
        // $product['product'] = Product::orderBy('id', 'desc');
        // return view('admin.product.index', compact('product'));
        return view('admin.product.index', compact('product', 'categories'));
    }


    // public function create()
    // {
    //     $categories = Category::all()->pluck('name', 'id');
    //     // $product = Product::all();
    //     $product = DB::table('products')->get();
    //     return view('admin.product.create', compact('categories'));
    // }

    public function store(Request $request)
    {

        $request->validate([
            'category_id' => 'required',
            'code' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'model' => 'required',
            'brand_name' => 'required',
            'description' => 'required',
            'color' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = array();
        $data['category_id'] = $request->input('category_id');
        $data['code'] = $request->input('code');
        $data['price'] = $request->input('price');
        $data['stock'] = $request->input('stock');
        $data['model'] = $request->input('model');
        $data['brand_name'] = $request->input('brand_name');
        $data['description'] = $request->input('description');
        $data['color'] = $request->input('color');
        $data['created_at'] = now();
        $data['updated_at'] = now();

        $image = $request->file('image');
        if ($image) {
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/media/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['image'] = $image_url;
        }
        $product = DB::table('products')->insert($data);
        // Product::insert($request->all());
        return redirect()->route('admin.product.index')
            ->with('success', 'Item Created Successfully');
    }

    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $categories = Category::all()->pluck('name', 'id');
        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $oldimage = $request->old_image;

        $data = array();
        $data['category_id'] = $request->input('category_id');
        $data['code'] = $request->input('code');
        $data['price'] = $request->input('price');
        $data['stock'] = $request->input('stock');
        $data['model'] = $request->input('model');
        $data['brand_name'] = $request->input('brand_name');
        $data['description'] = $request->input('description');
        $data['color'] = $request->input('color');
        $data['updated_at'] = new DateTime;

        $image = $request->file('image');
        if ($image) {
            unlink($oldimage);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/media/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['image'] = $image_url;
        }

        $product = DB::table('products')->where('id', $id)->update($data);
        return redirect()->route('admin.product.index')
            ->with('success', 'Item Updated Successfully');
    }

    public function show(Request $request, $id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $categories = Category::all()->pluck('name', 'id');
        // echo "<Pre>";
        // print_r($categories);
        // die;
        return view('admin.product.show', compact('product', 'categories'));
    }

    public function delete($id)
    {
        $data = DB::table('products')->where('id', $id)->first();
        $image = $data->image;
        unlink($image);
        $product = DB::table('products')->where('id', $id)->delete();
        return redirect()->route('admin.product.index')->with('success', 'Item has been successfully deleted!');
    }
}