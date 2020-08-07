<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

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
        $laptops = Product::orderBy('updated_at', 'desc')->limit(5)->where('category_id', 1)->get();
        $smartphones = Product::orderBy('updated_at', 'desc')->limit(5)->where('category_id', 2)->get();
        $tablets = Product::orderBy('updated_at', 'desc')->limit(5)->where('category_id', 3)->get();

        return view('client.laptops', compact('categories', 'laptops', 'smartphones', 'tablets'));
    }
}