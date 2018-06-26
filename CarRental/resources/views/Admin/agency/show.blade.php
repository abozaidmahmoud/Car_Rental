@extends('Admin/layouts/app')

@include('Admin/layouts/error_message')

@section('content')
	<h1 class="text-center alert alert-info "><i class="fa fa-diamond fa-lg"></i> Satrt Manage Agencies</h1><br>
	<center><a href="{{route('agency.create')}}" class="btn  bg-maroon"><i class="fa fa-archive"></i> Add Agency</a></center>

	<!--start search form -->	
	<form method="post" class="form_search" action="{{route('agency.index')}}">
		{{csrf_field()}}
		{{method_field('get')}}
		<div class="pull-right search">
			<i class="fa fa-search  search_icon "></i>
			<input type="search" name="search" id="agency_search" class="search_input"  >

		</div>
	</form> 
	<!--end search form -->	
	@include('Admin/layouts/message')
	<table class="table  table-responsive  table-hover ">
		<thead class="thead-dark">
			<tr class="success">
				<th>ID</th>
				<th> Agency  Name</th>
				<th>Email</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>	
		<tbody>
			@foreach($agencies as $agency)
			  <tr  >
				<td>{{$agency->id}}</td>
				<td>{{$agency->name}}</td>
				<td>{{$agency->email}}</td>
				
				<!-- edit agency -->
				<td>
					<a href="{{route('agency.edit',$agency->id)}}" class="btn"><i class="fa fa-edit fa-lg"></i></a>
				</td>
				<!-- delete agency -->
				<td>
					<form action="{{route('agency.destroy',$agency->id)}}" method="post">
						{{csrf_field()}}
						{{method_field('delete')}}
						<button type="submit"  class="btn  del_but"><i class="fa fa-trash fa-lg"></i></button>
					</form>
				</td>
			  </tr>
			@endforeach		
		</tbody>
	</table>
	{{$agencies->render()}}

@endsection


@section('footer_part')

<script>
	$('.search_icon').on('click',function(){
		$('.form_search').submit();
	})
</script>

<script>
$( function() {

  $( "#agency_search" ).autocomplete({
    source:'http://127.0.0.1:8000/agency/search' 
  });
} );
</script>
@endsection 

