@extends('Admin.layouts.app')
@section('head_part')
<link rel="stylesheet" href="{{asset('Admin/css/style.css')}}">
@endsection

@section('content')
@include('Admin/layouts/message')
<h1>Edit Agency</h1>
<div class="row">
	<form class="general_form" method="post" action="{{route('agency.update',$agency->id)}}"  enctype="multipart/form-data"> 
		{{csrf_field()}}
		{{method_field('patch')}}
		<div class="form-group ">
			<label for="title">Name</label>
			<input type="text" name="name" placeholder="Agency Name" class="form-control" value="{{$agency->name}}">
		</div>	
		<div class="form-group ">
			<label>Address</label>
			<input type="text" name="address" placeholder="address" class="form-control" value="{{$agency->address}}">
		</div>	
		<div class="form-group ">
			<label>Email</label>
			<input type="text" name="email" placeholder="Email" class="form-control" value="{{$agency->email}}">
		</div>	
		<div class="form-group ">
			<label>Mobile</label>
			<input type="text" name="mobile" placeholder="mobile" class="form-control" value="{{$agency->mobile}}">
		</div>	
		<div class="form-group ">
			<label>Image</label>
			<input type="file" name="image"  class="form-control">
		</div>	
		<div class="form-group">
			<button type="submit"  class="btn btn-app">
				<i class="fa fa-save"> Update</i>
			</button>
			<a href="{{route('agency.index')}}" class="btn btn-app"><i class="fa fa-arrow-left"></i> Back</a>
		</div>	
	</form>
</div>   



@endsection

@section('footer_part')


@endsection