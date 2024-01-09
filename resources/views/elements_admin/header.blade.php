<body class="bg-light bg-gradient">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary bg-white">
        <div class="container px-4 px-lg-5">
            <h1><a class="navbar-brand" href="{{route('admin.index')}}"><img src="/storage/images/logoadmin.png" alt="logo" width="200px" height="60px"></a></h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('admin.index')}}">Home</a></li>
                    
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Ajouter</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('doctor.create')}}">Ajouter medcin</a></li>
                            <li><a class="dropdown-item" href="{{route('hopital.create')}}">Ajouter hopital</a></li>
                            <li><a class="dropdown-item" href="{{route('services.create')}}">Ajouter Service </a></li>
                        </ul>
                    </li>
                    
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Afficher</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('doctor.index')}}">Afficher medcins</a></li>
                            <li><a class="dropdown-item" href="{{route('hopital.index')}}">Afficher  hopitals</a></li>
                            <li><a class="dropdown-item" href="{{route('services.index')}}">Afficher Services</a></li>
                            <li><a class="dropdown-item" href="{{route('admin.index')}}">Afficher maladies</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"> <a class="nav-link active " href="{{route('contacts.index')}}">Commentaires</a> </li>
                    
                
                </ul>
                <div class="d-flex">
                  

                  <form id="logout-form" action="{{url('/logout')}}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
                <div class="d-flex">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle active" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> {{ auth()->user()->nom }} </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li> <a class=" dropdown-item" href="{{route('Appointment.edit',auth()->user()->id )}}">Modifier Profil</a></li>
                        <li> <a class=" dropdown-item text-danger" href="{{url('/logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                           Se déconnecter
                          </a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class=" py-4">
        @yield('content_header')
        <section class="py-1">
            <div class="container px-4 px-lg-5 mt-5">
                
                    
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
        </section>
    </header>