@extends('Admin.layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			@foreach($agencies as $agency)
			<div class="col-md-4 col-sm-6 col-xs-12 agency_box">
			          <div class="info-box">
			          	<img src="{{Storage::disk('local')->url($agency->image)}}" class="info-box-icon ">
			            <div class="info-box-content">
			              <span class="info-box-text agencyname" >{{$agency->name}}</span>
			              <!-- display details for cars under each agency -->
			              <span class="info-box-number show_detail" ><a href="{{route('agency.show',$agency->id)}}">Show Details OF Rented Cars</a></span>
			              	<br>
			              	<!-- display details for users that rented cars under each agency -->
			               <span class="info-box-number show_detail" ><a href="{{url('admin/agency/'.$agency->id.'/show_rented_user')}}">Show Details For Rented Users <i class="fa fa-arrow-right"></i> </a></span>
			            </div>

			            
			            <!-- /.info-box-content -->
			          </div>
			          <!-- /.info-box -->
			</div>
			@endforeach	
		</div>
	</div>	

@endsection	
