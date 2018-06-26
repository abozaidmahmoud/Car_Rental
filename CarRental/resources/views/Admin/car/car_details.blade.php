@extends('Admin.layouts.app')

@section('content')
	
	<div class="container">
		<div class="car_box">
			
			<div class="row">
				<div class="media">
				  <div class="media-left">
				  	<span class="show_car_name"><i class="fa fa-car"></i> {{$car->name}}</span> <i class="list_hired_users"> <i class="fa fa-users"></i>is hired for Users</i><br>
				  	@foreach($car->hired_user as $user)	
				  		<div>
				  			<!-- show current hired user -->
				  					<?php 
				  						$start_time=strtotime($user->start_time);
				  						$end_time=strtotime($user->end_time);
				  						$current_time=strtotime(date('Y-m-d H:m:s'));
				  						if($start_time<=$current_time && $current_time<=$end_time  ){
				  							 echo  "Currently hired for "."<span class='list_hired_users_name'>"."<i class='fa fa-user'></i> ".$user->name."</span>";

				  							echo "<span class='from'>From  ". date('Y-m-d H:i A', strtotime($user->start_time))."</span>" ."<span class='to'>To  ". date('Y-m-d H:i A', strtotime($user->end_time))."</span>";
				  						}
				  						
				  					?>

				  			<!-- show current hired user -->	
				  		</div>
				  		@endforeach
				  		<br><br>
				  			<!-- list all hired user -->
				  			<i class="fa fa-users"></i> Users That Hired This Car
				  			@foreach($car->hired_user as $user)	
				 		<span class="list_hired_users_name">
				 			<i class="fa fa-user"></i> <a href="{{route('user.edit',$user->id)}}"> {{$user->name}}</a>
				 		</span>
				  	@endforeach 
				  	<br><br><br>

				      <img class="media-object show_car_img" src="{{Storage::disk('local')->url(explode('|',$car->image)[0] )}}" >
				      <p class="rent_price">Rent Price <span style="color: black">{{$car->rent_price}}$</span></p>
				    </a>
				  </div>
				  <div class="media-body show_car_detail">
				    <h4 class="media-heading show_car_name"><i class="fa fa-car"></i> {{$car->name}} </h4>
				    <span class="car_model ">Model  <i class="fa fa-truck fa-lg"></i> {{$car->model}}</span>
				     @foreach($car->agency as $agency_name)
				    	<p class="agency_name"><a href="{{route('agency.edit',$agency_name->id)}}">{{$agency_name->name}}</a></p>
				    @endforeach
				    
				    <p class="car_description">{{$car->description}}</p>
				  </div>
				</div>
			</div>
			
			@foreach(explode('|',$car->image) as $img)
			<div class="col-md-3 images">
				<img src="{{Storage::disk('local')->url($img)}}"  class="list_all_img img-responsive">
			</div>
			@endforeach
			
		</div>
	</div>
@endsection

@section('footer_part')

<script>
	$('.list_all_img').on('click',function(){
		$('.show_car_img').attr('src',$(this).attr('src'));
		$('.images img').removeClass('clicked_img');
		$(this).addClass('clicked_img');
		
	})
</script>

@endsection