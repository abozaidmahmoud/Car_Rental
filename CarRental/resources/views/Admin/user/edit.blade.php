@extends('admin.layouts.app')
@section('head_part')
	<link rel="stylesheet" href="{{asset('Admin/plugins/datepicker/datepicker3.css')}}">
	<link rel="stylesheet" href="{{asset('Admin/plugins/select2/select2.min.css')}}">
@endsection

@section('content')
@include('admin/layouts/message')
@include('admin/layouts/error_message')
<h1>Update user</h1>
<div class="row">
	<form class="general_form" method="post" action="{{route('user.update',$user->id)}}">
		{{csrf_field()}}
		{{method_field('put')}}
		<div class="form-group ">
			<label for="name">Name</label>
			<input type="text" name="name" placeholder="user Name" class="form-control" value="{{$user->name}}" >
		</div>	
		<div class="form-group ">
			<label>Email</label>
			<input type="email" name="email" placeholder="email" class="form-control" value="{{$user->email}}" >
		</div>	
		<div class="form-group">
		    <label>Phone</label>
		    <div class="input-group">
		            <div class="input-group-addon">
		                 <i class="fa fa-phone"></i>
		            </div>
		            <input type="text" name="phone" class="form-control" value="{{$user->phone}}" >
		    </div>        
		</div>	
		<div class="form-group ">
			<label>Address</label>
			<input type="text" name="address" placeholder="Address" class="form-control" value="{{$user->address}}">
		</div>	
		<!-- list all car for user to hire -->
		<div class="form-group">
		        <label>Select A Car to Hire</label>
		        <select name="car" class="form-control select2 select2-hidden-accessible"   data-placeholder="Select a Car to Hire" style="width: 100%;" tabindex="-1" aria-hidden="true">
		        		<option selected disabled>Select Car To Hire</option>
		        		@foreach($cars as $car)
		                  <option value="{{$car->id}}"
		                  	@if($car->id==$user->car_id)
		                  		selected
		                  	@endif
		                   > 
		                  	{{$car->name}}
		                  </option>
		                @endforeach            
		        </select>
		</div>
		<div class="form-group">
		    <label>Start Time</label>
		    <div class="input-group">
		            <div class="input-group-addon">
		                 <i class="fa fa-calendar"></i>
		            </div>
		            <input type="text" name="start_time" class="form-control"   value="{{$user->start_time}}" >

		    </div>  

		</div>
		<div class="form-group">
		    <label>End Time</label>
		    <div class="input-group">
		            <div class="input-group-addon">
		                 <i class="fa fa-calendar"></i>
		            </div>
		            <input type="text"  name="end_time" class="form-control"    value="{{$user->end_time}}">
		    </div>        
		</div>
         
       	
		<div class="form-group">
			<button type="submit"  class="btn btn-app add_user">
				<i class="fa fa-plus"> Update</i>
			</button>
			<a href="{{route('user.index')}}" class="btn btn-app"><i class="fa fa-arrow-left"></i> Back</a>
		</div>	
	</form>
</div>   

@endsection

@section('footer_part')

<script src="{{asset('Admin/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{asset('Admin/plugins/datepicker/bootstrap-datepicker.js')}}"></script>



<script >
	$(".select2").select2();
</script>


@endsection