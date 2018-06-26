@extends('Admin/layouts/App')

@section('content')

	
<div class="limiter">
	<a href="{{url('/')}}" class="pull-right back_to_home btn btn-app"><i class="fa fa-home"></i> Back To Home Page</a>
	<div class="container-login100">
		<div class="wrap-login100">
			@include('Admin/layouts/message')
			<form class="login100-form validate-form" method='post' action='{{url('admin/login')}}'>
				{{csrf_field()}}
				<span class="login100-form-title p-b-26">
					Admin Login
				</span>
				<br>

				<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
					<input class="input100" type="text" name="email">
					<span class="focus-input100" data-placeholder="Email"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Enter password">
					<span class="btn-show-pass">
						<i class="zmdi zmdi-eye"></i>
					</span>
					<input class="input100" type="password" name="password">
					<span class="focus-input100" data-placeholder="Password"></span>
				</div>
				<div class="form-group">
					<label>Remember me <input type="checkbox" name="remember"></label>
				</div>
				<div class="container-login100-form-btn">
					<div class="wrap-login100-form-btn">
						<div class="login100-form-bgbtn"></div>
						<button class="login100-form-btn">
							Login
						</button>
						
					</div>

				</div>

			</form>
		</div>
	</div>
</div>


@endsection