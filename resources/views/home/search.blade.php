@extends('layouts.master')
@section('title', 'Tìm kiếm')
@section('content')
<link rel="stylesheet" href="{{asset('frontend/css/search.css')}}">
<div id="wrap-inner">
    <div class="products">
        <h3>Tìm kiếm với từ khóa: <span>{{$search}}</span></h3>
        <div class="product-list row">
            @foreach ($products as $product)
            <div class="product-item col-md-3 col-sm-6 col-xs-12">
                <a href="#"><img src="{{asset($product->image)}}" class="img-thumbnail"></a>
                <p><a href="#">{{$product->name}}</a></p>
                <p class="price">{{number_format($product->price, 0, ',', '.')}} VNĐ</p>
                <div class="marsk">
                    <a href={{route('product.detail', ['id'=>$product->id, 'slug'=>$product->slug])}}>Xem chi tiết</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div id="pagination">
        <ul class="pagination pagination-lg justify-content-center">
            {{$products->appends(['keyword'=>$search])->links('vendor.pagination.bootstrap-4')}}
        </ul>
    </div>
</div>
@endsection
