@extends('layouts.master')
@section('title', 'Giỏ hàng')
@section('content')
    <link rel="stylesheet" href="{{ asset('frontend/css/cart.css') }}">
    @if (Cart::count() > 0)
        <div id="wrap-inner">
            <div id="list-cart">
                <h3>Giỏ hàng</h3>
                <form action="{{ route('cart.update') }}" method="POST">
                    @csrf
                    <table class="table table-bordered .table-responsive text-center">
                        <tr class="active">
                            <td width="11.111%">Ảnh mô tả</td>
                            <td width="22.222%">Tên sản phẩm</td>
                            <td width="22.222%">Số lượng</td>
                            <td width="16.6665%">Đơn giá</td>
                            <td width="16.6665%">Thành tiền</td>
                            <td width="11.112%">Thao tác</td>
                        </tr>
                        @foreach (Cart::content() as $row)
                            <tr>
                                <td>
                                    <img class="img-thumbnail" src="{{ asset($row->options->thumbnail) }}">
                                </td>
                                <td>{{ $row->name }}</td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" type="number" min="1" name="qty[{{ $row->rowId }}]"
                                            value={{ $row->qty }}>
                                    </div>
                                </td>
                                <td><span class="price">{{ number_format($row->price, 0, ',', '.') }} VNĐ</span></td>
                                <td><span class="price">{{ number_format($row->total, 0, ',', '.') }} VNĐ</span></td>
                                <td><a href="{{ route('cart.delete', ['rowId' => $row->rowId]) }}">Xóa</a></td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="row" id="total-price">
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            Tổng thanh toán: <span class="total-price">{{ Cart::total() }} VNĐ</span>

                        </div>
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <a href="{{ route('home') }}" class="btn btn-info">Mua tiếp</a>
                            <button class="btn btn-success" type="submit" name="cập nhật">Cập nhật</button>
                            <a href="{{ route('cart.removeall') }}" class="btn btn-danger">Xóa giỏ hàng</a>
                        </div>
                    </div>
                </form>
            </div>

            <div id="xac-nhan">
                <h3>Xác nhận mua hàng</h3>
                <form action="{{route('cart.sendemail')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input required type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="name">Họ và tên:</label>
                        <input required type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại:</label>
                        <input required type="number" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="add">Địa chỉ:</label>
                        <input required type="text" class="form-control" id="add" name="add">
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-default">Thực hiện đơn hàng</button>
                    </div>
                </form>
            </div>
        </div>
    @else
        <div id="wrap-inner">
            <div class="cart-null">
                <p class="cart-null1"><img src={{ asset('img/cart-null.png') }} alt=""></p>
                <p class="cart-null2">Không có sản phẩm nào trong giỏ hàng của bạn</p>
                <p class="cart-null3"><a href={{ route('home') }} title="Trang chủ">ĐẾN TRANG CHỦ TUAN-STORE</a>
                </p>
            </div>
        </div>
    @endif
@endsection
