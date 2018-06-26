


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><i class="fa fa-car fa-lg"></i> Car Rental</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{url('/')}}"><i class="fa fa-home "></i> Home <span class="sr-only">(current)</span></a></li>
      </ul>
      <!--start search for car -->
      <form class="navbar-form navbar-left" action="{{url('/')}}" >
        <div class="form-group">
          <input type="text" class="form-control"  name="search" id="car_search" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Search</button>
      </form>
      <!--end search for car -->
      <ul class="nav navbar-nav navbar-right">
        <li ><a style="color: white;font-weight: bold;" href="{{url('admin/login')}}"><i class="fa fa-user-secret fa-lg"></i> Login</a></li>
       
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<script src="{{asset('Admin/js/jquery-3.2.1.min.js')}}"></script>

<script>
  $('.navbar-collapse li').click(function(){
    $('.navbar-collapse li').removeClass('active');
      $(this).addClass('active');
  })
</script>

<script>
$( function() {

  $( "#car_search" ).autocomplete({
    source:'http://127.0.0.1:8000/home/car/search' 
  });
} );
</script>