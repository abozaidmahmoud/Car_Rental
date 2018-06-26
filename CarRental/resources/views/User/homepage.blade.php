
@extends('User/layouts/app')

@section('content')
@include('Admin/layouts/message')
@include('Admin/layouts/error_message')
		<div class="container">
			<ul class="pull-right ul_sort_agency">
				<i class="fa fa-filter"></i> Sort by:   
				<a href="{{url('agency/all/show_car')}}" class="agency_name_list">All</a>
				@foreach($agencies as $agency)
					<li>
						<a href="{{url('agency/'.$agency->id.'/show_car')}}" class="pull-right agency_name_list">{{$agency->name}}</a>
					</li>
				@endforeach
			</ul>
			<br>
			<!-- list all car  -->
			<div class="row car_main_box">
			<ul class="ul_list_car">
			<?php $i=0; ?>
			@foreach($cars as $car)
					<div class="list_car col-lg-3 col-sm-6">
						<li>
							@if($car->hired==1)
								@foreach($car->hired_user as $user)
								       <?php $start_time=date_create($user->start_time); ?>
									   <?php $end_time=date_create($user->end_time); ?>
									  <?php $current_time=date_create(); ?>
									   @if($start_time <= $current_time and $current_time<=$end_time)
									   		<a href="#">
												<img class="img_car" src="{{Storage::disk('local')->url(explode('|',$car->image)[0])}}" style="opacity: 0.5">
												<span class="hired">currently hired</span>
											</a>
											<p class="carname" >{{$car->name}}</p>
											<p class="text-center">{{$car->rent_price}}$</p>
											<butoon class="btn hire_but" 
												 onclick="(function(e){e.preventDefault();})(event)"
												>Hire
											</butoon>
											<i class="fa fa-eye fa-lg  car_show_details"  data-toggle="modal" data-target="#showcar{{$car->id}}"></i>


										@else
											@if($i==0)
											<a href="#">
												<img class="img_car" src="{{Storage::disk('local')->url(explode('|',$car->image)[0])}}">
											</a>
														<p class="carname" >{{$car->name}}</p>
														<p class="text-center">{{$car->rent_price}}$</p>
														<butoon  class="btn hire_but" data-toggle="modal" data-target="#hire_car{{$car->id}}" >Hire</butoon>
														<i class="fa fa-eye fa-lg  car_show_details"  data-toggle="modal" data-target="#showcar{{$car->id}}"></i>	
														<?php $i++; ?>		
											@endif								


										@endif
								@endforeach

							@else
								<a href="#">
									<img class="img_car" src="{{Storage::disk('local')->url(explode('|',$car->image)[0])}}">
								</a>
											<p class="carname" >{{$car->name}}</p>
											<p class="text-center">{{$car->rent_price}}$</p>
											<butoon  class="btn hire_but" data-toggle="modal" data-target="#hire_car{{$car->id}}" >Hire</butoon>
											<i class="fa fa-eye fa-lg  car_show_details"  data-toggle="modal" data-target="#showcar{{$car->id}}"></i>

							@endif
						
							<!--car not here yet -->
							
  						

							

						</li>
					</div>	





					<!-- start show car details modal -->
						<div class="modal fade" id="showcar{{$car->id}}" tabindex="-1" role="dialog">
						  <div class="modal-dialog modal-lg" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title"><i class="fa fa-car"></i> {{$car->name}}</h4>
						      </div>
						      <div class="modal-body">
						       		 @include('User.car_detail')
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						      </div>
						    </div>
						  </div>
						</div>
					<!-- end show car details modal -->

					<!--start hire car modal  -->

						<div class="modal fade" id="hire_car{{$car->id}}" tabindex="-1" role="dialog">
						  <div class="modal-dialog modal-lg"  role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title"><i class="fa fa-car"></i> Hire</h4>
						      </div>
						      <div class="modal-body">
						        	@include('User/book_car')
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						      
						      </div>
						    </div>
						  </div>
						</div>
					<!--end hire car modal  -->

			@endforeach
			</ul>
			</div>
	    </div>


@endsection

@section('footer_part')

<script >
	
	$('.agency_name').on('click',function(){
		$(this).addClass('design');

	});		


</script>

@endsection