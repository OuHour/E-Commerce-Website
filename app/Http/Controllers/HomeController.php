<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $categories = Category::all()->pluck('name', 'id');
        $laptops = Product::orderBy('updated_at', 'desc')->limit(5)->where('category_id', 1)->get();
        $smartphones = Product::orderBy('updated_at', 'desc')->limit(5)->where('category_id', 2)->get();
        $tablets = Product::orderBy('updated_at', 'desc')->limit(5)->where('category_id', 3)->get();

        return view('client.home', compact('categories', 'laptops', 'smartphones', 'tablets'));
    }

    public function laptop()
    {

        $categories = Category::all()->pluck('name', 'id');
        $laptops = Product::orderBy('model', 'asc')->where('category_id', 1)->paginate(9);
        // $smartphones = Product::orderBy('updated_at', 'desc')->limit(5)->where('category_id', 2)->get();
        // $tablets = Product::orderBy('updated_at', 'desc')->limit(5)->where('category_id', 3)->get();

        return view('client.laptops', compact('categories', 'laptops'));
    }

    public function smartphone()
    {

        $categories = Category::all()->pluck('name', 'id');
        $smartphones = Product::orderBy('model', 'asc')->where('category_id', 2)->paginate(9);
        // $smartphones = Product::orderBy('updated_at', 'desc')->limit(5)->where('category_id', 2)->get();
        // $tablets = Product::orderBy('updated_at', 'desc')->limit(5)->where('category_id', 3)->get();

        return view('client.smartphones', compact('categories', 'smartphones'));
    }

    public function tablet()
    {

        $categories = Category::all()->pluck('name', 'id');
        $tablets = Product::orderBy('model', 'asc')->where('category_id', 3)->paginate(9);
        // $smartphones = Product::orderBy('updated_at', 'desc')->limit(5)->where('category_id', 2)->get();
        // $tablets = Product::orderBy('updated_at', 'desc')->limit(5)->where('category_id', 3)->get();

        return view('client.tablets', compact('categories', 'tablets'));
    }

    public function productDetail($id)
    {

        $categories = Category::all()->pluck('name', 'id');
        $product = Product::Where('id', $id)->first();
        $productRelated = Product::Where('category_id', $product->category_id)->inRandomOrder()->limit(4)->get();

        return view('client.product_detail', compact('categories', 'product', 'productRelated'));
    }
}