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
                    <div class="panel-heading">Sửa sản phẩm</div>
                    <div class="panel-body">
                        <form action="{{ route('product.update', ['id' => $product->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row" style="margin-bottom:40px">
                                <div class="col-xs-8">
                                    <div class="form-group">
                                        <label>Tên sản phẩm</label>
                                        <input required type="text" name="name" class="form-control"
                                            value="{{ $product->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Giá sản phẩm</label>
                                        <input required type="number" name="price" class="form-control"
                                            value="{{ $product->price }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Ảnh sản phẩm</label>
                                        <input id="img" type="file" name="img" class="form-control hidden"
                                            onchange="changeImg(this)" value="{{ $product->image }}">
                                        <img id="avatar" class="thumbnail" width="300px" src="{{ asset($product->image) }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Phụ kiện</label>
                                        <input required type="text" name="accessories" class="form-control"
                                            value="{{ $product->accessories }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Bảo hành</label>
                                        <input required type="text" name="warranty" class="form-control"
                                            value="{{ $product->warranty }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Khuyến mãi</label>
                                        <input required type="text" name="promotion" class="form-control"
                                            value="{{ $product->promotion }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Tình trạng</label>
                                        <input required type="text" name="condition" class="form-control"
                                            value="{{ $product->condition }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <select required name="status" class="form-control">
                                            <option @if ($product->status == 1) selected @endif value="1">Còn hàng</option>
                                            <option @if ($product->status == 0) selected @endif value="0">Hết hàng</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Miêu tả</label>
                                        <textarea class="form-control" name="description"
                                            value={!! $product->description !!}></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Danh mục</label>
                                        <select required name="category" class="form-control">
                                            <option>Chọn</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @if ($category->id == $product->category_id) selected @endif>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Sản phẩm nổi bật</label><br>
                                        Có: <input type="radio" name="featured" value="1" @if ($product->featured == 1) checked @endif>
                                        Không: <input type="radio" name="featured" value="0" @if ($product->featured == 0) checked @endif>
                                    </div>
                                    <button type="submit" value="Cập nhật" class="btn btn-primary">Cập nhật</button>
                                    <a href="#" class="btn btn-danger">Hủy bỏ</a>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.main-->
    <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/chart.min.js') }}"></script>
    <script src="{{ asset('js/chart-data.js') }}"></script>
    <script src="{{ asset('js/easypiechart.js') }}"></script>
    <script src="{{ asset('js/easypiechart-data.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script>
        $('#calendar').datepicker({});
        ! function($) {
            $(document).on("click", "ul.nav li.parent > a > span.icon", function() {
                $(this).find('em:first').toggleClass("glyphicon-minus");
            });
            $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
        }(window.jQuery);

        $(window).on('resize', function() {
            if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
        })
        $(window).on('resize', function() {
            if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
        });

        function changeImg(input) {
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function(e) {
                    //Thay đổi đường dẫn ảnh
                    $('#avatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function() {
            $('#avatar').click(function() {
                $('#img').click();
            });
        });

    </script>
@endsection
