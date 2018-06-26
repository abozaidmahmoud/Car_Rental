
<form class="general_form" method="post" action="{{url('hire_car')}}">
		{{csrf_field()}}

		<div class="form-group">
		    <label>Username</label>
		    <div class="input-group">
		            <div class="input-group-addon">
		                 <i class="fa fa-user"></i>
		            </div>
		            <input type="text" name="name"  class="form-control" value="{{old('name')}}" >
		    </div>        
		</div>
		<input type="hidden" name="car_id" value="{{$car->id}}">
		<div class="form-group">
		    <label>Email</label>
		    <div class="input-group">
		            <div class="input-group-addon">
		                 <i class="fa fa-envelope"></i>
		            </div>
		            <input type="email" name="email"  class="form-control" value="{{old('email')}}" >
		    </div>        
		</div>
		<div class="form-group">
		    <label>Phone</label>
		    <div class="input-group">
		            <div class="input-group-addon">
		                 <i class="fa fa-phone"></i>
		            </div>
		            <input type="text" name="phone"  class="form-control" value="{{old('phone')}}" >
		    </div>        
		</div>	

		<div class="form-group">
		    <label>Address</label>
		    <div class="input-group">
		            <div class="input-group-addon">
		                 <i class="fa fa-address-book-o"></i>
		            </div>
		            <input type="text" name="address"  class="form-control" value="{{old('address')}}" >
		    </div>        
		</div>

		<div class="form-group">
		    <label>Start Time</label>
		    <div class="input-group">
		            <div class="input-group-addon">
		                 <i class="fa  fa-calendar-plus-o"></i>
		            </div>
		            <input type="text" name="start_time"  class="form-control" value="{{old('start_time')}}" >
		    </div>        
		</div>

		<div class="form-group">
			    <label>End Time</label>
			    <div class="input-group">
			            <div class="input-group-addon">
			                 <i class="fa  fa-calendar-plus-o"></i>
			            </div>
			            <input type="text" name="end_time"  class="form-control" value="{{old('end_time')}}" >
			    </div>        
		</div>
		<input type="submit" class="btn btn-danger" value="Hire">
</form>

@section('footer_part')

@endsection