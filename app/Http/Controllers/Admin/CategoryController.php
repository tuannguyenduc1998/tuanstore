<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware(function ($request, $next){
            session(['module_action' => 'category']);
            return $next($request);
        });
    }

    function index(){
        return view('admin.category');
    }

    function store(Request $request){
        $request->validate([
            'name'=> ['required','unique:categories']
        ],
        [
            'unique'=>':attribute không được trùng'
        ],
        [
            'name'=> 'Tên danh mục'
        ]
    );
        Category::create([
            'name'=> $request->input('name'),
            'slug'=> Str::slug($request->input('name'))
        ]);
        return redirect('admin/category');
    }

    function edit($id){
        return view('admin.editcategory', compact('id'));
    }

    function update(Request $request,$id){
        Category::find($id)
        ->update([
            'name'=> $request->input('name'),
            'slug'=> Str::slug($request->input('name'))
        ]);
        return redirect('admin/category');
    }

    function delete($id){
        Category::where('id', $id)
        ->delete();
        return redirect('admin/category');
    }
}
