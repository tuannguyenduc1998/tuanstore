<?php

namespace App\Http\Controllers\Auth;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    function show()
    {
        return view('home.cart');
    }

    function add($id){
        $product = Product::find($id);
        Cart::add(
            ['id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->price,
            'options' => ['thumbnail' => $product->image]]
        );
        return view('home.cart');
    }

    function delete($rowId)
    {
        Cart::remove($rowId);
        return view('home.cart');
    }

    function removeall()
    {
        Cart::destroy();
        return view('home.cart');
    }

    function update(Request $request)
    {
        $products = $request->get('qty');
        foreach($products as $k=>$v)
        {
            Cart::update($k, $v);
        }
        return view('home.cart');
    }

    function sendMail(Request $request)
    {
        $data['info'] = $request->all();
        $email = $request->input('email');
        $name = $request->input('name');
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total();
        Mail::send('home.email', $data, function ($message) use ($email, $name){
            $message->from('tuantretrau1998@gmail.com', 'Nguyễn Đức Tuấn');
            $message->to( $email, $name);
            $message->cc('thinhnguyen19911998@gmail.com', 'Thịnh Nguyễn');
            $message->subject('Xác nhận hóa đơn mua hàng Tuan-Store');
        });
        Cart::destroy();
        return redirect('cart/complete');
    }

    function complete()
    {
        return view('home.complete');
    }
}
