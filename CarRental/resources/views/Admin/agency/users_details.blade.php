@extends('Admin.layouts.app')

@section('content')
	<div class="row">
		@foreach($cars as $car)
			<ul>
			@foreach($car->hired_user as $user)
				
			    <li class="col-md-3 list_hired_user">
						<img src="{{asset('user.jpeg')}}" width="100px" height="90px" class="img_responsive "><br>
						 <span class="username"><i class="fa fa-user"></i> {{$user->name}}</span><br>
						 <span class="hired_car_name"><em>hired</em> <i class="fa fa-car"></i> {{$car->name}}</span><br> 
						  
						 <button class="button" data-target='#usermodal{{$user->id}}'   data-toggle='modal'>show info</button> 

						 <!-- start modal show user info -->

						 	<div class="modal" id='usermodal{{$user->id}}' tabindex="-1" role="dialog">
						 	  <div class="modal-dialog modal-lg"  role="document">
						 	    <div class="modal-content">
						 	      <div class="modal-header">
						 	        <h5 class="modal-title modal_username"><i class="fa fa-user"></i> {{$user->name}}</h5>
						 	        <p>
						 	      		<em class="hired">hired</em>  <b class="show_car_name"><i class="fa fa-car"></i>   {{$car->name}}</b>
						 	      	</p>
						 	      	<h5>
						 	      		<i class="fa fa-calendar-check-o fa-lg"></i>
						 	      		<span class="from"> From </span> {{date('Y-m-d H:m A' ,strtotime($user->start_time))}}
						 	      		<span class="to"> To </span> {{date('Y-m-d H:m A' ,strtotime($user->end_time))}}
						 	      		
						 	      	</h5>
						 	      	<a  href="{{route('user.edit',$user->id)}}" class="button pull-right"><i class="fa fa-edit"></i> Edit</a>
						 	        
						 	      </div>
						 	      <div class="modal-body">
						 	      	<div class="user_details">
						 	      		<p><i class="fa fa-user fa-lg"></i>  {{$user->name}}</p>
						 	      		<p><i class="fa fa-address-book-o fa-lg"></i>  {{$user->address}}</p>
						 	      		<p><i class="fa fa-envelope fa-lg"></i>  {{$user->email}}</p>
						 	      		<p><i class="fa fa-phone fa-lg"></i>  {{$user->phone}}<p>
						 	      	</div>
						 	       
						 	      	<div class="show_user_info">
						 	      		
						 	      		<img src="{{ Storage::disk('local')->url(explode('|',$car->image)[0])}}" width="160px" height="100px">

						 	      		
						 	      	</div>



						 	      </div>
						 	      <div class="modal-footer">
						 	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						 	      </div>
						 	    </div>
						 	  </div>
						 	</div>
						 <!-- end modal show user info -->	

				</li>
				
			@endforeach
		</ul>
	@endforeach
</div>
@endsection