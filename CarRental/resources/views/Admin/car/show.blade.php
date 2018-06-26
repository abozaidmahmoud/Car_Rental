@extends('admin/layouts/app')

@section('content')
	<h1 class="text-center alert alert-info "><i class="fa fa-diamond fa-lg"></i> Satrt Manage Cars</h1><br>
	<center><a href="{{route('car.create')}}" class="btn  bg-maroon"> Add <i class="fa fa-car"></i></a></center>

	<!--start search form -->	
	<form method="post" class="form_search" action="{{route('car.index')}}">
		{{csrf_field()}}
		{{method_field('get')}}
		<div class="pull-right search">
			<i class="fa fa-search  search_icon "></i>
			<input type="search" name="search" id="car_search" class="search_input"  >

		</div>
	</form> 
	<!--end search form -->	


	<table class="table table-bordered table-hover ">
		<thead>
			<tr>
				<td>ID</td>
				<td>Name</td>
				<td>Model</td>
				<td>Rent Price</td>
				<td>image</td>
				<td>Edit</td>
				<td>Delete</td>
				
			</tr>
		</thead>	
		<tbody>
			@foreach($cars as $car)
			  <tr>
				<td>{{$car->id}}</td>
				<td>{{$car->name}}</td>
				<td>{{$car->model}}</td>
				<td>{{$car->rent_price}}$</td>
				<!-- display first image of car -->
				<td ">
					<img src="{{Storage::disk('local')->url(explode('|', $car->image)[0])}}" class="img-thumbnail" style="width: 150px;height: 70px"  >
				</td>
				<!-- edit car -->
				<td>
					<a href="{{route('car.edit',$car->id)}}" class="btn"><i class="fa fa-edit fa-lg"></i></a>
				</td>
				<!-- delete car -->
				<td>
					<form action="{{route('car.destroy',$car->id)}}" method="post">
						{{csrf_field()}}
						{{method_field('delete')}}
						<button type="submit"  class="btn del_but"><i class="fa fa-trash fa-lg"></i></button>
					</form>
				</td>
				
			  </tr>
			   
			@endforeach		

		</tbody>
	</table>

	{{$cars->render()}}

@endsection

@section('footer_part')

<script>
	$('.search_icon').on('click',function(){
		$('.form_search').submit();
		
	})
</script>

<script>
$( function() {

  $( "#car_search" ).autocomplete({
    source:'http://127.0.0.1:8000/car/search' 
  });
} );
</script>
@endsection 

