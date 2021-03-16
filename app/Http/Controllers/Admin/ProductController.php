<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware(function ($request, $next){
            session(['module_action' => 'product']);
            return $next($request);
        });
    }

    function index(){
        $products = Product::paginate(8);
        return view('admin.product', compact('products'));
    }

    function create(){
        return view('admin.addproduct');
    }

    function add(Request $request){
        $input = $request->all();
        $input['slug'] = Str::slug($request->input('name'));
        if($request->hasFile('img')){
            $image = $request->img;
            $filename = $image->getClientOriginalName();
            $image = 'img/'.$filename;
            $input['image'] = $image;
        }
        $input['category_id'] = $request->input('category');
        Product::create($input);
        $request->img->move('public/img/', $filename);
        return redirect('admin/product');
    }

    function edit($id){
        $product = Product::find($id);
        return view('admin.editproduct', compact('product'));
    }

    function update(Request $request, $id){
        $product = Product::find($id);
        if($request->hasFile('img')){
            $image = $request->img;
            $filename = $image->getClientOriginalName();
            $image = 'img/'.$filename;
            $imagename = $image;
        }
        else {
            $imagename = $product->image;
        }
        Product::where('id',$id)->update([
            'name'=> $request->input('name'),
            'slug'=> Str::slug($request->input('name')),
            'price'=> $request->input('price'),
            'image'=> $imagename,
            'accessories'=> $request->input('accessories'),
            'warranty'=> $request->input('warranty'),
            'promotion'=> $request->input('promotion'),
            'condition'=> $request->input('condition'),
            'status'=> $request->input('status'),
            'description'=> $request->input('description'),
            'category_id'=> $request->input('category'),
            'featured'=> $request->input('featured'),
        ]);
        if($product->image != $imagename){
            $request->img->move('public/img/', $filename);
        }
        return redirect('admin/product');
    }

    function delete($id)
    {
        Product::where('id', $id)
        ->delete();
        return redirect('admin/product');
    }
}
