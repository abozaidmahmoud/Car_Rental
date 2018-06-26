  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          @if(auth()->guard('admin')->check())
          <p>{{auth()->guard('admin')->user()->name}}</p>
          @endif
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
  
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="{{url('admin/home')}}">
            <i class="fa fa-home fa-lg"></i> <span>Home</span>
          </a>
         
        </li>
      
        <li>
          <a href="{{route('agency.index')}}">
            <i class="fa fa-archive fa-lg"></i>
            <span>Agencies</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"><?php use App\Model\agency; echo agency::count();?> <i class="fa fa-archive"></i> </small>
            </span>
          </a>
        </li>


        <li>
          <a href="{{route('car.index')}}">
            <i class="fa fa-car fa-lg"></i> <span>Cars</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"><?php use App\Model\car; echo car::count();?> <i class="fa fa-car"></i> </small>
            </span>
          </a>
        </li>
        
         <li>
          <a href="{{route('user.index')}}">
            <i class="fa fa-users fa-lg"></i>  <span>Users</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"><?php use App\Model\user; echo user::count();?> <i class="fa fa-users"></i></small>
            </span>
          </a>
        </li>
       
          
       
  
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
