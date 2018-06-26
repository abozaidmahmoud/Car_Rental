@extends('Admin.layouts.app')


@section('content')
@include('Admin/layouts/message')
@include('Admin/layouts/error_message')
<h1>Add New Car</h1>
<div class="row">
	<form class="general_form" method="post" action="{{route('car.store')}}" enctype="multipart/form-data" >
		{{csrf_field()}}
		<div class="form-group ">
			<label for="name">Name</label>
			<input type="text" name="name" placeholder="Car Name" class="form-control" value="{{old('name')}}">
		</div>	
		<div class="form-group ">
			<label for="title">Select Agency</label>
			<select name="agency" class="form-control">
				<option selected disabled>Select Agency</option>
				@foreach($agencies as $agency)
					<option value="{{$agency->id}}"
							@if( $agency->id == old('agency') )
								selected
							@endif
						>
						{{$agency->name}}
					</option>
				@endforeach
			</select>
		</div>	

		<div class="form-group ">
			<label>Car Model</label>
			<input type="text" name="model" placeholder="Car Model" class="form-control" value="{{old('model')}}">
		</div>	
		<div class="form-group ">
			<label>Rent Price</label>
			<input type="text" name="rent_price" placeholder="Rent Price" class="form-control" value="{{old('price')}}">
		</div>	
		<div class="form-group ">
			<label>Image</label>
			<input type="file" name="image[]" multiple class="form-control">
		</div>
		<div class="form-group ">
			<label>Description</label>
			<textarea  name="description" class="form-control" id="editor1">{{old('description')}}</textarea>
		</div>	
		<div class="form-group">
			<button type="submit"  class="btn btn-app add_tag">
				<i class="fa fa-plus fa-small">Add car</i>
			</button>
			<a href="{{route('car.index')}}" class="btn btn-app"><i class="fa fa-arrow-left fa-small"></i> Back</a>
		</div>	
	</form>
</div>   



@endsection

@section('footer_part')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
	CKEDITOR.replace('editor1');
</script>
@endsection