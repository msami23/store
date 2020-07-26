<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

    <title>@yield('title',config('app.name'))</title>

	<!-- Main Styles -->
	<link rel="stylesheet" href="{{asset('admin/styles/style.min.css')}}">

	<!-- Material Design Icon -->
	<link rel="stylesheet"  href="{{asset('admin/fonts/material-design/css/materialdesignicons.css')}}">

	<!-- mCustomScrollbar -->
	<link rel="stylesheet"  href="{{asset('admin/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css')}}">

	<!-- Waves Effect -->
	<link rel="stylesheet"  href="{{asset('admin/plugin/waves/waves.min.css')}}">

	<!-- Sweet Alert -->
	<link rel="stylesheet"  href="{{asset('admin/plugin/sweet-alert/sweetalert.css')}}">

	<!-- Morris Chart -->
	<link rel="stylesheet"  href="{{asset('admin/plugin/chart/morris/morris.css')}}">

	<!-- FullCalendar -->
	<link rel="stylesheet"  href="{{asset('admin/plugin/fullcalendar/fullcalendar.min.css')}}">
	<link rel="stylesheet"  href="{{asset('admin/plugin/fullcalendar/fullcalendar.print.css')}}" media='print'>

	<!-- Dark Themes -->
    <link rel="stylesheet"  href="{{asset('admin/styles/style-dark.min.css')}}">
    @yield('css')
</head>

<body>
<div class="main-menu">
	<header class="header">
		<a href="index.html" class="logo"><i class="ico mdi mdi-cube-outline"></i>MyAdmin</a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
		<div class="user">
			<a href="#" class="avatar"><img src="{{asset('admin/images/avatar-sm-5.jpg')}}" alt=""><span class="status online"></span></a>
			<h5 class="name"><a href="profile.html">Administrator</a></h5>
			<h5 class="position">{{ Auth::user()->name }}</h5>
			<!-- /.name -->
			<div class="control-wrap js__drop_down">
				<i class="fa fa-caret-down js__drop_down_button"></i>
				<div class="control-list">
					<div class="control-item"><a href="profile.html"><i class="fa fa-user"></i> Profile</a></div>
					<div class="control-item"><a href="#"><i class="fa fa-gear"></i> Settings</a></div>
					<div class="control-item"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> {{ __('Sign out') }}</a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form></div>
				</div>
				<!-- /.control-list -->
			</div>
			<!-- /.control-wrap -->
		</div>
		<!-- /.user -->
	</header>
	<!-- /.header -->
	<div class="content">

		<div class="navigation">
			<h5 class="title">Navigation</h5>
			<!-- /.title -->
			<ul class="menu js__accordion">
				<li class="current">
					<a class="waves-effect" href="{{route('index')}}"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Dashboard</span></a>
				</li>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-desktop-mac"></i><span>Categories</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('categories')}}">Show Categories</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-cube-outline"></i><span>Products</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('products')}}">Show Products</a></li>

					</ul>
					<!-- /.sub-menu js__content -->
                </li>
                <li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-cube-outline"></i><span>Tags</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('tags.index')}}">Show Products</a></li>

					</ul>
					<!-- /.sub-menu js__content -->
                </li>
            </ul>


			<!-- /.menu js__accordion -->
			<h5 class="title">Extra</h5>
			<!-- /.title -->
			<ul class="menu js__accordion">
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-chart-areaspline"></i><span>Charts</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="chart-3d.html">3D Charts</a></li>

					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-table"></i><span>Tables</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="tables-basic.html">Basic Tables</a></li>

					</ul>
					<!-- /.sub-menu js__content -->
				</li>

			</ul>
			<!-- /.menu js__accordion -->
		</div>
		<!-- /.navigation -->
    </div>
	<!-- /.content -->
</div>

<!-- /.main-menu -->
<div class="fixed-navbar">
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		<h1 class="page-title">Home</h1>
		<!-- /.page-title -->
	</div>
	<!-- /.pull-left -->
	<div class="pull-right">
		<div class="ico-item">
			<a href="#" class="ico-item mdi mdi-magnify js__toggle_open" data-target="#searchform-header"></a>
			<form action="#" id="searchform-header" class="searchform js__toggle"><input type="search" placeholder="Search..." class="input-search"><button class="mdi mdi-magnify button-search" type="submit"></button></form>
			<!-- /.searchform -->
		</div>
		<!-- /.ico-item -->
		<a href="#" class="ico-item mdi mdi-email notice-alarm js__toggle_open" data-target="#message-popup"></a>
		<a href="#" class="ico-item pulse"><span class="ico-item mdi mdi-bell notice-alarm js__toggle_open" data-target="#notification-popup"></span></a>
        <a href="{{ route('logout') }}"   onclick="event.preventDefault();
        document.getElementById('logout-form').submit(); " class="ico-item mdi mdi-logout "></a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
	</div>
	<!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->

<div id="notification-popup" class="notice-popup js__toggle" data-space="75">
	<h2 class="popup-title">Your Notifications</h2>
	<!-- /.popup-title -->
	<div class="content">
		<ul class="notice-list">
			<li>
				<a href="#">
					<span class="avatar"><img src="{{asset('admin/images/avatar-sm-1.jpg')}}" alt=""></span>
					<span class="name">John Doe</span>
					<span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
					<span class="time">10 min</span>
				</a>
			</li>

		</ul>
		<!-- /.notice-list -->
		<a href="#" class="notice-read-more">See more messages <i class="fa fa-angle-down"></i></a>
	</div>
	<!-- /.content -->
</div>
<!-- /#notification-popup -->

<div id="message-popup" class="notice-popup js__toggle" data-space="75">
	<h2 class="popup-title">Recent Messages<a href="#" class="pull-right text-danger">New message</a></h2>
	<!-- /.popup-title -->
	<div class="content">
		<ul class="notice-list">
			<li>
				<a href="#">
					<span class="avatar"><img src="{{asset('admin/images/avatar-sm-1.jpg')}}" alt=""></span>
					<span class="name">John Doe</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">10 min</span>
				</a>
			</li>

		</ul>
		<!-- /.notice-list -->
		<a href="#" class="notice-read-more">See more messages <i class="fa fa-angle-down"></i></a>
	</div>
	<!-- /.content -->
</div>

<!-- /#message-popup -->
@yield('content')
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="{{asset('admin/script/html5shiv.min.js')}}"></script>
		<script src="{{asset('admin/script/respond.min.js')}}"></script>
	<![endif]-->
	<!--
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="{{asset('admin/scripts/jquery.min.js')}}"></script>
	<script src="{{asset('admin/scripts/modernizr.min.js')}}"></script>
	<script src="{{asset('admin/plugin/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('admin/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
	<script src="{{asset('admin/plugin/nprogress/nprogress.js')}}"></script>
	<script src="{{asset('admin/plugin/sweet-alert/sweetalert.min.js')}}"></script>
	<script src="{{asset('admin/plugin/waves/waves.min.js')}}"></script>

	<!-- Morris Chart -->
	<script src="{{asset('admin/plugin/chart/morris/morris.min.js')}}"></script>
	<script src="{{asset('admin/plugin/chart/morris/raphael-min.js')}}"></script>
	<script src="{{asset('admin/scripts/chart.morris.init.min.js')}}"></script>

	<!-- Flot Chart -->
	<script src="{{asset('admin/plugin/chart/plot/jquery.flot.min.js')}}"></script>
	<script src="{{asset('admin/plugin/chart/plot/jquery.flot.tooltip.min.js')}}"></script>
	<script src="{{asset('admin/plugin/chart/plot/jquery.flot.categories.min.js')}}"></script>
	<script src="{{asset('admin/plugin/chart/plot/jquery.flot.pie.min.js')}}"></script>
	<script src="{{asset('admin/plugin/chart/plot/jquery.flot.stack.min.js')}}"></script>
	<script src="{{asset('admin/scripts/chart.flot.init.min.js')}}"></script>

	<!-- Sparkline Chart -->
	<script src="{{asset('admin/plugin/chart/sparkline/jquery.sparkline.min.js')}}"></script>
	<script src="{{asset('admin/scripts/chart.sparkline.init.min.js')}}"></script>

	<!-- FullCalendar -->
	<script src="{{asset('admin/plugin/moment/moment.js')}}"></script>
	<script src="{{asset('admin/plugin/fullcalendar/fullcalendar.min.js')}}"></script>
	<script src="{{asset('admin/scripts/fullcalendar.init.js')}}"></script>

    <script src="{{asset('admin/scripts/main.min.js')}}"></script>
    @yield('js')
</body>
</html>
