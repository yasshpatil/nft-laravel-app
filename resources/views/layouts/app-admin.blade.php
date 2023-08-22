<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
        <title>NFT - @yield('title')</title>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="" />
		<meta property="og:site_name" content="NFT Bricks" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="icon" type="image/svg+xml" href="{{asset('img/favicon.svg')}}">
        <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{asset('metronic/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('metronic/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-E3XVQW36MS"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-E3XVQW36MS');
        </script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled">
		   
		<div class="wrapper " id="kt_wrapper">
					<!--begin::Header-->
					<!--end::Header-->
					@yield('content')
					<!--begin::Footer-->
					
					<!--end::Footer-->
				</div>
		
		<!--end::Main-->
		@routes
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{asset('metronic/assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('metronic/assets/js/scripts.bundle.js')}}"></script>
		<script src="{{asset('metronic/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
		<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
		@if(Route::currentRouteName() == 'admin.orderslist')
			<script src="{{asset('js/admin/orders-datatable.js')}}"></script>
		@endif

		@if(Route::currentRouteName() == 'admin.userslist')
		<script src="{{asset('js/admin/users-datatable.js')}}"></script>
		@endif
		<!--end::Global Javascript Bundle-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>