<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>TuanStore - @yield('title')</title>
	<link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/home.css')}}">
	<script type="text/javascript" src="{{asset('frontend/js/jquery-3.2.1.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script type="text/javascript" src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="{{asset('frontend/img/home/icon.png')}}">
    <script type="text/javascript">
		$(function() {
			var pull        = $('#pull');
			menu        = $('nav ul');
			menuHeight  = menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});
		});

		$(window).resize(function(){
			var w = $(window).width();
			if(w > 320 && menu.is(':hidden')) {
				menu.removeAttr('style');
			}
		});
	</script>
</head>
<body>
	<!-- header -->
	<header id="header">
		<div class="container">
			<div class="row">
				<div id="logo" class="col-md-3 col-sm-12 col-xs-12">
					<h1>
						<a href="{{route('home')}}"><img src="{{asset('frontend/img/home/logo.png')}}"></a>
						<nav><a id="pull" class="btn btn-danger" href="#">
							<i class="fa fa-bars"></i>
						</a></nav>
					</h1>
				</div>
				<div id="search" class="col-md-7 col-sm-12 col-xs-12">
                    <form action="{{route('search')}}" method="GET">
					<input type="text" name="keyword" placeholder="Nhập từ khóa ..." value="{{request()->input('keyword')}}">
                    <button class="btnSearch" type="submit">Tìm kiếm</button>
                    </form>
				</div>
                {{-- <div class="col-md-2 col-sm-12 col-xs-12">
                    <a class="d-flex justify-content-center" href="{{route('admin.home')}}">Admin</a>
                </div> --}}
				<div id="cart" class="col-md-2 col-sm-12 col-xs-12">
					<a class="display" href="{{route('cart.show')}}">Giỏ hàng</a>
					<a href="{{route('cart.show')}}">{{Cart::count()}}</a>
				</div>
			</div>
		</div>
	</header><!-- /header -->
	<!-- endheader -->

	<!-- main -->
	<section id="body">
		<div class="container">
			<div class="row">
				<div id="sidebar" class="col-md-3">
					<nav id="menu">
						<ul>
							<li class="menu-item">danh mục sản phẩm</li>
                            @foreach ($categories as $category)
                               <li class="menu-item"><a href="{{route('product.category', ['id'=>$category->id, 'slug'=>$category->slug])}}" title="">{{$category->name}}</a></li>
                            @endforeach
						</ul>
						<!-- <a href="#" id="pull">Danh mục</a> -->
					</nav>

					<div id="banner-l" class="text-center">
						<div class="banner-l-item">
							<a href="#"><img src="{{asset('frontend/img/home/banner-l-1.png')}}" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="{{asset('frontend/img/home/banner-l-2.png')}}" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="{{asset('frontend/img/home/banner-l-3.png')}}" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="{{asset('frontend/img/home/banner-l-4.png')}}" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="{{asset('frontend/img/home/banner-l-5.png')}}" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="{{asset('frontend/img/home/banner-l-6.png')}}" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="{{asset('frontend/img/home/banner-l-7.png')}}" alt="" class="img-thumbnail"></a>
						</div>
					</div>
				</div>

				<div id="main" class="col-md-9">
					<!-- main -->
					<!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
					<div id="slider">
						<div id="demo" class="carousel slide" data-ride="carousel">

							<!-- Indicators -->
							<ul class="carousel-indicators">
								<li data-target="#demo" data-slide-to="0" class="active"></li>
								<li data-target="#demo" data-slide-to="1"></li>
								<li data-target="#demo" data-slide-to="2"></li>
							</ul>

							<!-- The slideshow -->
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="{{asset('frontend/img/home/slide-1.png')}}" alt="Los Angeles" >
								</div>
								<div class="carousel-item">
									<img src="{{asset('frontend/img/home/slide-2.png')}}" alt="Chicago">
								</div>
								<div class="carousel-item">
									<img src="{{asset('frontend/img/home/slide-3.png')}}" alt="New York" >
								</div>
							</div>

							<!-- Left and right controls -->
							<a class="carousel-control-prev" href="#demo" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#demo" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>
						</div>
					</div>

					<div id="banner-t" class="text-center">
						<div class="row">
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="#"><img src="{{asset('frontend/img/home/banner-t-1.png')}}" alt="" class="img-thumbnail"></a>
							</div>
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="#"><img src="{{asset('frontend/img/home/banner-t-1.png')}}" alt="" class="img-thumbnail"></a>
							</div>
						</div>
					</div>

                    @yield('content')

					<!-- end main -->
				</div>
			</div>
		</div>
	</section>
	<!-- endmain -->

	<!-- footer -->
	<footer id="footer">
		<div id="footer-t">
			<div class="container">
				<div class="row">
					<div id="logo-f" class="col-md-4 col-sm-12 col-xs-12 text-center">
						<a href="{{route('home')}}"><img src="{{asset('frontend/img/home/logo.png')}}"></a>
					</div>
					<div id="hotline" class="col-md-4 col-sm-12 col-xs-12">
						<h3>Hotline</h3>
						<p>Phone Sale: (+84) 777 844 595</p>
						<p>Email: tuannguyenduc151198@gmail.com</p>
					</div>
					<div id="contact" class="col-md-4 col-sm-12 col-xs-12">
						<h3>Contact Us</h3>
						<p>Address: 36DH3 - Hạ Nông Tây - Điện Phước - Điện Bàn - Quảng Nam</p>
					</div>
				</div>
			</div>
			<div id="footer-b">
				<div class="container">
					<div class="row">
						<div id="footer-b-r" class="col-md-12 col-sm-12 col-xs-12 text-center">
							<p>© 2021 Tuấn Nguyễn. All Rights Reserved</p>
						</div>
					</div>
				</div>
				<div id="scroll">
					<a href="#"><img src="{{asset('frontend/img/home/scroll.png')}}"></a>
				</div>
			</div>
		</div>
	</footer>
	<!-- endfooter -->
</body>
</html>
