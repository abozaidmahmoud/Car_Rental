@extends('Admin/layouts/app')

@section('content')
	<div class="info-box bg-red general_box">
	            <span style="width: 30%;height: 100%" class="info-box-icon"><i class="fa fa-info-circle fa-lg"></i></span>
	            
	            <div  class="info-box-content">
	              <span class="info-box-text home_agency_name" >Agencies</span>
	              <span class="info-box-number total_agency">Total Number OF Agencies  {{$count}}</span>

	              <div class="progress">
	                <div class="progress-bar" style="width:0"></div>
	              </div>
	                  <span class="progress-description agency_link">
	                    <a href="{{url('admin/agencies_details')}}">Show Details Of Each Agency <i class="fa fa-info-circle"> </i> </a>
	                  </span>
	            </div>
	            
	            <!-- /.info-box-content -->
	          </div>
@endsection