
		
		<div class="media">
				  <div class="media-left">
					  	@if($car->hired==1)
					  		<?php $i=0; ?>
					  		<span class="show_car_name"><i class="fa fa-car fa-lg"></i> {{$car->name}}</span> <i class="list_hired_users">Is Hired for <i class="fa fa-user fa-lg"></i> </i><br>
					  		@foreach($car->hired_user as $user)
					  			<?php 
					  				$start_time=date_create($user->start_time);
					  				$end_time=date_create($user->end_time);
					  				$current_time=date_create();
					  				if($start_time<=$current_time && $current_time<=$end_time  ){
					  					
					  					$interval = date_diff($end_time,$current_time);
					  					echo "<span class='remain_time'>"."Hire Expire after "."</span>". $interval->format('%a days');
					  				}
					  				else{
					  					$i++;
					  					echo "<i class='fa fa-calendar-minus-o'> "."</i> "."<span class='time_from'> From  ". date('Y-m-d H:i A', strtotime($user->start_time))."</span>" ."<span class='time_to'> To  ". date('Y-m-d H:i A', strtotime($user->end_time))."</span>"."<br>";
					  					?> 
					  					
					  					<?php
					  				}
					  			?>
					  		@endforeach
					  		@if($i!=0)
					  			<butoon  class="btn hire_but" data-toggle="modal" data-target="#hire_car{{$car->id}}" >Hire</butoon>
					  		@endif
					  		
					  	@else
					  		<span class="show_car_name"><i class="fa fa-car fa-lg"></i> {{$car->name}}</span> <i class="list_hired_users"> <i class="fa fa-users"></i>Is Available for hire </i><br>
					  	@endif
					  
					      <img class="media-object show_car_img" src="{{Storage::disk('local')->url(explode('|',$car->image)[0] )}}" >
					      <p class="rent_price">Rent Price <span style="color: black">{{$car->rent_price}}$</span></p>
					    </a>
				  </div>
				 <div class="media-body show_car_detail">
					   <h4 class="media-heading show_car_name"><i class="fa fa-car"></i> {{$car->name}} </h4>
					   <span class="car_model ">Model  <i class="fa fa-truck fa-lg"></i> {{$car->model}}</span>
					    @foreach($car->agency as $agency_name)
					   	<p class="agency_name">{{$agency_name->name}}</p>
					   @endforeach
					   
					   <p class="car_description">{{$car->description}}</p>
				 </div>

				  @foreach(explode('|',$car->image) as $img)
					  <div class="col-md-3 images">
					  	<img src="{{Storage::disk('local')->url($img)}}"  class="list_all_img img-responsive">
					  </div>
				  @endforeach 
		</div>

@section('footer_part')

<script>
	$('.list_all_img').on('click',function(){
		$('.show_car_img').attr('src',$(this).attr('src'));
		$('.images img').removeClass('clicked_img');
		$(this).addClass('clicked_img');
		
	})
</script>

@endsection
		
		
		
	
