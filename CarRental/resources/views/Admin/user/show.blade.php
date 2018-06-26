@extends('admin/layouts/app')

@include('Admin/layouts/error_message')
@section('content')
	<h1 class="text-center alert alert-info "><i class="fa fa-diamond fa-lg"></i> Satrt Manage Users</h1><br>
	<center><a href="{{route('user.create')}}" class="btn  bg-maroon"> Add    <i class="fa fa-user"> </i></a></center>

	<!--start search form -->	
	<form method="post" class="form_search" action="{{route('user.index')}}">
		{{csrf_field()}}
		{{method_field('get')}}
		<div class="pull-right search">
			<i class="fa fa-search  search_icon "></i>
			<input type="search" name="search" id="user_search" class="search_input"  >
		</div>
	</form> 
	<!--end search form -->	

@include('Admin/layouts/message')
	<table class="table table-bordered table-hover ">
		<thead>
			<tr>
				<td>ID</td>
				<td>Name</td>
				<td>Email</td>
				<td>Phone</td>
				<td>Address</td>
				<td>Start Time</td>
				<td>End Time</td>
				<td>Edit</td>
				<td>Delete</td>
			</tr>
		</thead>	
		<tbody>
			@foreach($users as $user)
			  <tr>
				<td>{{$user->id}}</td>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->phone}}</td>
				<td>{{$user->address}}</td>
				<td>{{$user->start_time}}</td>
				<td>{{$user->end_time}}</td>
				<!-- edit user -->
				<td>
					<a href="{{route('user.edit',$user->id)}}" class="btn"><i class="fa fa-edit fa-lg"></i></a>
				</td>
				<!-- delete user -->
				<td>
					<form action="{{route('user.destroy',$user->id)}}" method="post">
						{{csrf_field()}}
						{{method_field('delete')}}
						<button type="submit"  class="btn del_but"><i class="fa fa-trash fa-lg"></i></button>
					</form>
				</td>
			  </tr>
			@endforeach		
		</tbody>
	</table>
	{{$users->render()}}

@endsection

@section('footer_part')

<script>
	$('.search_icon').on('click',function(){
		$('.form_search').submit();
	})
</script>

<script>
$( function() {

  $( "#user_search" ).autocomplete({
    source:'http://127.0.0.1:8000/user/search' 
  });
} );
</script>
@endsection 