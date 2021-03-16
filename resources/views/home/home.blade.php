@extends('layouts.master')
@section('title', 'Home')
@section('content')
<div id="wrap-inner">
    <div class="products">
        <h3>sản phẩm nổi bật</h3>
        <div class="product-list row">
            @foreach ($products as $product)
            @if($product->featured==1)
            <div class="product-item col-md-3 col-sm-6 col-xs-12">
                <a href="#"><img src="{{asset($product->image)}}" class="img-thumbnail"></a>
                <p><a href="#">{{$product->name}}</a></p>
                <p class="price">{{number_format($product->price, 0, ',', '.')}} VNĐ</p>
                <div class="marsk">
                    <a href={{route('product.detail', ['id'=>$product->id, 'slug'=>$product->slug])}}>Xem chi tiết</a>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>

    <div class="products">
        <h3>sản phẩm mới</h3>
        <div class="product-list row">
            @foreach ($products as $product)
            @if($product->featured==0)
            <div class="product-item col-md-3 col-sm-6 col-xs-12">
                <a href="#"><img src="{{asset($product->image)}}" class="img-thumbnail"></a>
                <p><a href="#">{{$product->name}}</a></p>
                <p class="price">{{number_format($product->price, 0, ',', '.')}} VNĐ</p>
                <div class="marsk">
                    <a href={{route('product.detail', ['id'=>$product->id, 'slug'=>$product->slug])}}>Xem chi tiết</a>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
