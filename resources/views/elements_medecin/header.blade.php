<body>
  <div id="eq-loader">
    <div class="eq-loader-div">
        <div class="eq-loading dual-loader mx-auto mb-5"></div>
    </div>
  </div>

  <!--  BEGIN NAVBAR  -->
  <header class="desktop-nav header navbar fixed-top">
      <div class="nav-logo mr-sm-5 ml-sm-4">
          <a href="javascript:void(0);" class="nav-link sidebarCollapse d-inline-block mr-sm-5" data-placement="bottom">
              <i class="flaticon-menu-line-3"></i>
          </a>
          <a href="{{route('admin.index')}}" class=""> <img src="/storage/images/logoadmin.png" alt="logo" width="200px" height="60px"></a>
      </div>
      <ul class="navbar-nav flex-row mr-auto">
          <li class="nav-item ml-4 d-lg-none d-sm-block d-none">
              <form class="form-inline search-full form-inline search animated-search" role="search">
                  <i class="flaticon-search-1 d-lg-none d-block"></i>
                  <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
              </form>
          </li>
          <li class="nav-item d-lg-block d-none">
            <form action="{{'/search'}}" method="post">
                @csrf
                <div class="input-group mb-3">
                  <input type="text" name="search" class="form-control"  placeholder='Rechercher patient  par id '>
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" >Rechercher</button>
                  </div>
                </div>
             </form>
          </li>
      </ul>

      <ul class="navbar-nav flex-row ml-lg-auto">

          

            
      </ul>
  </header>
  @yield('content_header')
  <div style="background-color: #f0f0f0">
    @if (session('success_hopital'))
    <div class="alert alert-success">
         {{ session('success_hopital') }}
    </div>
  @endif
  @if (session('success_services'))
  <div class="alert alert-success">
       {{ session('success_services') }}
  </div>
@endif
@if (session('success_dcotor'))
  <div class="alert alert-success">
       {{ session('success_dcotor') }}
  </div>
@endif
@if (session('success_hopital_update'))
<div class="alert alert-success">
     {{ session('success_hopital_update') }}
</div>
@endif
@if (session('success_doctor_update'))
<div class="alert alert-success">
   {{ session('success_doctor_update') }}
</div>
@endif
@if (session('success_service_update'))
<div class="alert alert-success">
 {{ session('success_service_update') }}
</div>
@endif
@if (session('success_service_delete'))
<div class="alert alert-success">
 {{ session('success_service_delete') }}
</div>
@endif
@if (session('success_hopital_delete'))
<div class="alert alert-success">
 {{ session('success_hopital_delete') }}
</div>
@endif
@if (session('success_doctor_delete'))
<div class="alert alert-success">
 {{ session('success_doctor_delete') }}
</div>
@endif
@if (session('success_admin_update'))
<div class="alert alert-success">
{{ session('success_admin_update') }}
</div>
@endif
  </div>
  <!--  END NAVBAR  -->

  