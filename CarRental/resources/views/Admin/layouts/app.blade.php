<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Dashbord</title>
		@include('Admin/layouts/head')
		@section('head_part')
		@show
	</head>
	<body class="hold-transition skin-red sidebar-mini">
		<div class="wrapper">
			@if(auth()->guard('admin')->check())
				@include('Admin/layouts/header')	
				@include('Admin/layouts/sidebar')

			@endif
			<div class="content-wrapper">
				<section class="content-header ">
					@section('content')
					@show
				</section>

			</div>			
		</div>	
		@include('Admin/layouts/footer')
		@section('footer_part')
		@show	
	</body>

</html>