@extends('layouts.master')
@section('title', 'Chi tiết sản phẩm')
@section('content')
<link rel="stylesheet" href="{{asset('frontend/css/details.css')}}">
<div id="wrap-inner">
    <div id="product-info">
        <div class="clearfix"></div>
        <h3>{{$product->name}}</h3>
        <div class="row">
            <div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
                <img class="img-thumbnail" src="{{asset($product->image)}}">
            </div>
            <div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
                @if($product->status==0)
                    <p class="status">SẢN PHẨM ĐÃ NGỪNG KINH DOANH</p>
                @endif
                <p>Giá: <span class="price">{{number_format($product->price, 0, ',', '.')}} VNĐ</span></p>
                <p>Bảo hành: {{$product->warranty}}</p>
                <p>Phụ kiện: {{$product->accessories}}</p>
                <p>Tình trạng: {{$product->condition}}</p>
                <p>Khuyến mại: {{$product->promotion}}</p>
                <p class="{{$product->status == 0 ? 'd-none' : 'add-cart text-center'}}">
                    <a href={{route('product.cart', ['id'=>$product->id])}}>Đặt hàng online</a>
                </p>
            </div>
        </div>
    </div>
    <div id="product-detail">
        <h3>Chi tiết sản phẩm</h3>
        <p class="text-justify">{!! $product->description !!}</p>
    </div>
    <div id="comment">
        <h3>Bình luận</h3>
        <div class="col-md-9 comment">
            <form action="{{route('product.comment', ['id'=>$product->id])}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input required type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="name">Tên:</label>
                    <input required type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="cm">Bình luận:</label>
                    <textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-default">Gửi</button>
                </div>
            </form>
        </div>
    </div>
    <div id="comment-list">
        @foreach ($comments as $comment)
        <ul>
            <li class="com-title">
                {{$comment->name}}
                <br>
                <span>{{date('Y-m-d H:i',strtotime($comment->created_at))}}</span>
            </li>
            <li class="com-details">
                {{$comment->content}}
            </li>
        </ul>
        @endforeach
    </div>
</div>
@endsection
