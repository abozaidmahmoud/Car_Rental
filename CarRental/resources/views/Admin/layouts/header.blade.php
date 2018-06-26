  <header class="main-header">
    <!-- Logo -->
    <a href="{{url('admin/home')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->

      <span class="logo-lg"> <i class="fa fa-car fa-lg"></i>  <b>Car</b>Rentail</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
       
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
              @if(!auth()->guard('admin')->guest())
              <span class="hidden-xs">{{auth()->guard('admin')->user()->name}}</span>
              @endif
            </a>
            <ul class="dropdown-menu" >
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
              </li>
              <!-- Menu Body -->
            
              <!-- Menu Footer-->
              <li class="user-footer">
                

                 <div class="pull-left">
                  <a href="{{url('/')}}" class="btn btn-default btn-flat"
                  ><i class="fa fa-home"></i> Home Page</a>

                </div>
                <div class="pull-right">
                  <a href="{{url('logout')}}" class="btn btn-default btn-flat"
                  ><i class="fa fa-sign-out"></i> Sign out</a>

                </div>
                
              </li>
            </ul>
          </li>
         
        </ul>
      </div>
    </nav>
  </header>