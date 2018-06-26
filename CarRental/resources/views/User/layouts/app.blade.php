<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Home</title>
		@include('User/layouts/head')
		@section('head_part')
		@show
	</head>
	<body >
		@include('User/layouts/navbar')
			
					@section('content')
					@show
				
		
		@include('User/layouts/footer')
		@section('footer_part')
		@show	
	</body>

</html>