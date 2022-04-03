@extends('layouts.admin')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm</h1>
            </div>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">

                <div class="panel panel-primary">
                    <div class="panel-heading">Danh sách sản phẩm</div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                <a href={{ route('product.create') }} class="btn btn-primary">Thêm sản phẩm</a>
                                <table class="table table-bordered" style="margin-top:20px;">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>ID</th>
                                            <th width="30%">Tên Sản phẩm</th>
                                            <th>Giá sản phẩm</th>
                                            <th width="20%">Ảnh sản phẩm</th>
                                            <th>Danh mục</th>
                                            <th>Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ number_format($product->price, 0, ',', '.') }} VNĐ</td>
                                                <td>
                                                    <img width="200px" src="{{ asset($product->image) }}" class="thumbnail">
                                                </td>
                                                <td>{{ $product->category_id }}</td>
                                                <td>
                                                    <a href={{ route('product.edit', ['id' => $product->id]) }}
                                                        class="btn btn-warning"><i class="fa fa-pencil"
                                                            aria-hidden="true"></i> Sửa</a>
                                                    <a href={{ route('product.delete', ['id' => $product->id]) }}
                                                        class="btn btn-danger"><i class="fa fa-trash"
                                                            aria-hidden="true"></i> Xóa</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div id="pagination" class="text-center">
                            <ul class="pagination">
                                {{ $products->links('vendor.pagination.bootstrap-4') }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.main-->
@endsection
