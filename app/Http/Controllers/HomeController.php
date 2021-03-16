<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

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
        $products = Product::all();
        return view('home.home', compact('products'));
    }

    function detail($id)
    {
        $product = Product::find($id);
        $comments = Comment::where('product_id', $id)->get();
        return view('home.detailproduct', compact('product', 'comments'));
    }

    function category($id)
    {
        $products = Product::where('category_id', $id)->paginate(8);
        $category = Category::where('id', $id)->first();
        return view('home.category', compact('products','category'));

    }

    function cart()
    {
        return view('home.cart');
    }

    function comment(Request $request, $id)
    {
        Comment::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'content' => $request->input('content'),
            'product_id'=> $id
        ]);
        $product = Product::where('id', $id)->first();
        $comments = Comment::where('product_id', $id)->get();
        return view('home.detailproduct', compact('id', 'product', 'comments'));
    }

    function search(Request $request)
    {
        $search = $request->input('keyword');
        $products = Product::where('name', 'LIKE', "%$search%")->paginate(8);
        return view('home.search', compact('products', 'search'));
    }
}
