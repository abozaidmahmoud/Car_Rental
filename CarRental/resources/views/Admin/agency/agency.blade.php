@extends('Admin.layouts.app')

@section('content')
@include('Admin/layouts/message')
@include('Admin/layouts/error_message')
<h1>add new agency</h1>
<div class="row">
	<form class="general_form" method="post" action="{{route('agency.store')}}" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="form-group ">
			<label for="title">Name</label>
			<input type="text" name="name" placeholder="Agency Name" class="form-control" value="{{old('name')}}">
		</div>	
		<div class="form-group ">
			<label>Address</label>
			<input type="text" name="address" placeholder="address" class="form-control"  value="{{old('address')}}">
		</div>	
		<div class="form-group ">
			<label>Email</label>
			<input type="text" name="email" placeholder="Email" class="form-control"  value="{{old('email')}}">
		</div>	
		<div class="form-group ">
			<label>Mobile</label>
			<input type="text" name="mobile" placeholder="mobile" class="form-control"  value="{{old('mobile')}}">
		</div>	
		<div class="form-group ">
			<label>Image</label>
			<input type="file" name="image"  class="form-control">
		</div>	
		<div class="form-group">
			<button type="submit"  class="btn btn-app add_tag">
				<i class="fa fa-plus fa-small">Add Agency</i>
			</button>
			<a href="{{route('agency.index')}}" class="btn btn-app"><i class="fa fa-arrow-left fa-small"></i> Back</a>
		</div>	
	</form>
</div>   



@endsection

@section('footer_part')


@endsection