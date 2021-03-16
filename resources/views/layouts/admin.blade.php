<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Tuan-Store</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <script type="{{ asset('text/javascript') }}" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/lumino.glyphs.js') }}"></script>
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{route('admin.home')}}">Tuan-Store Admin</a>
                <ul class="user-menu">
                    <a href="{{route('home')}}">Về trang chủ</a>
                    <li class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user">
                                <use xlink:href="#stroked-male-user"></use>
                            </svg> {{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href={{ route('logout') }}><svg class="glyph stroked cancel">
                                        <use xlink:href="#stroked-cancel"></use>
                                    </svg> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div><!-- /.container-fluid -->
    </nav>

    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        @php
            $module_action = session('module_action');
        @endphp
        <ul class="nav menu">
            <li role="presentation" class="divider"></li>
            <li class="{{ $module_action == 'home' ? 'active' : '' }}"><a href={{ route('admin.home') }}><svg
                        class="glyph stroked dashboard-dial">
                        <use xlink:href="#stroked-dashboard-dial"></use>
                    </svg> Trang chủ</a></li>
            <li class="{{ $module_action == 'product' ? 'active' : '' }}"><a href={{ route('admin.product') }}><svg
                        class="glyph stroked calendar">
                        <use xlink:href="#stroked-calendar"></use>
                    </svg> Sản phẩm</a></li>
            <li class="{{ $module_action == 'category' ? 'active' : '' }}"><a href={{ route('admin.category') }}><svg
                        class="glyph stroked line-graph">
                        <use xlink:href="#stroked-line-graph"></use>
                    </svg> Danh mục</a></li>
            <li role="presentation" class="divider"></li>
        </ul>

    </div>
    <!--/.sidebar-->

    @yield('content')
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
        })

    </script>
</body>

</html>
