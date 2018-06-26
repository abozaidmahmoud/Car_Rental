@extends('Admin.layouts.app')


@section('content')

	<div class="container">
		<div class="row ">
			@if(!$cars->count())
				<h2 class="alert alert-warning text-center">Threr Are no Hired Care For This Agency</h2>
				<a href="{{url('admin/agencies_details')}}" class="btn btn-app"><i class="fa fa-arrow-left"></i> Back</a>
			@endif
		<ul >
				@foreach($cars as $car)

					<li class="list_car" >
						<a href="#">
							<img class="img_car" src="{{Storage::disk('local')->url(explode('|',$car->image)[0])}}">
						</a>
						<h4 class="show_car_name" >{{$car->name}}</h4><br>
						<a href="{{route('car.show',$car->id)}}" class="show_car_detail"><i class="fa fa-eye"></i> Show Details</a>
					</li>
				@endforeach
		</ul>
		</div>
    </div>  
@endsection



