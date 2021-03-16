<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function __construct()
    {
        $this->middleware(function ($request, $next){
            session(['module_action' => 'home']);
            return $next($request);
        });
    }
    function index(){
        $data['products_count'] = Product::count();
        $data['comments_count'] = Comment::count();
        $data['users_count'] = User::count();
        $data['categories_count'] = Category::count();
        return view('admin.home', $data);
    }
}
