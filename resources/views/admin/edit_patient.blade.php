@extends('layouts.defaultM')
@section('content_medecin')


<div class="main-container" id="container">
    <div class="overlay"></div>
    <div class="ps-overlay"></div>
    <div class="search-overlay"></div>
    
<!--  BEGIN MODERN  -->
<div class="modernSidebar-nav header navbar">
    <div class="">
        <nav id="modernSidebar">
            <ul class="menu-categories pl-0 m-0" id="topAccordion">
                <li class="menu">
                    <a href="{{route('admin.index')}}"  style="text-decoration-line: none;" >
                        <div class="">
                            <img src="/storage/images/home.png" width="40" height="40" >
                        <span>Acceuil</span>
                    </div>
                </a>
                        
                
            </li>

            <li class="menu">
                <a href="#uiAndComponents" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed" style="text-decoration-line: none;">
                    <div class="">
                        <img src="/storage/images/add.png" width="40" height="40" >
                        <span>Ajouter</span>
                    </div>
                </a>
                <div class="collapse submenu list-unstyled eq-animated eq-fadeInUp" id="uiAndComponents" data-parent="#topAccordion">
                    <ul class="submenu-scroll">
                        <li>
                            <ul class="list-unstyled sub-submenu" id="dashboards">
                                <li class="active">
                                    <a href="{{route('doctor.create')}}" style="text-decoration-line: none;"> <div><img src="/storage/images/stethoscope.png" width="26" height="26" > <b style="font-size: 17px;">Medecins</b></div> </a>
                                </li>
                                <li>
                                    <a href="{{route('services.create')}}" style="text-decoration-line: none;"> <div> <img src="/storage/images/technical-support.png" width="26" height="26" > <b style="font-size: 17px;">Services</b> </div> </a>
                                </li>
                                
                            </ul>
                        </li>
                    </ul>
                </div>
                
            </li>

            <li class="menu">
                <a href="#tables-forms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed" style="text-decoration-line: none;">
                    <div class="">
                        <img src="/storage/images/display.png" width="40" height="40" >
                        <span>Afficher </span>
                    </div>
                </a>
                <div class="submenu list-unstyled collapse eq-animated eq-fadeInUp" id="tables-forms" data-parent="#topAccordion">
                    
                        <ul class="submenu-scroll">
                            <li>
                                <ul class="list-unstyled sub-submenu" id="dashboards">
                                    <li>
                                        <a href="{{route('services.index')}}" style="text-decoration-line: none;"> <div><img src="/storage/images/technical-support.png" width="26" height="26" ><b style="font-size: 17px;">Services</b>  </div> </a>
                                    </li>
                                <li>
                                    <a href="{{route('doctor.index')}}" style="text-decoration-line: none;"> <div><img src="/storage/images/stethoscope.png" width="26" height="26" ><b style="font-size: 17px;">Medecins</b></div> </a>
                                </li>
                                <li>
                                    <a href="{{route('admin.index')}}" style="text-decoration-line: none;"> <div><img src="/storage/images/patient.png" width="26" height="26" > <b  style="font-size: 17px;">Patients</b></div> </a>
                                </li>
                                
                                </ul>
                            </li>
                       </ul>
                </div>
                
            </li>

            <li class="menu">
                <a href="{{'/Analyses'}}"  style="text-decoration-line: none;">
                    <div class="">
                        <img src="/storage/images/analytics.png" width="40" height="40" >
                        <span>analytique</span>
                    </div>
                </a>
                
            </li>

            <li class="menu">
                <a href="{{route('contacts.index')}}"  style="text-decoration-line: none;">
                    <div class="">
                        <img src="/storage/images/email.png" width="40" height="40" >
                        <span>contacts</span>
                    </div>
                </a>
                
            </li>

            <li class="menu">
                
                    <a href="#more" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" style="text-decoration-line: none;">
                        <div class="">
                            <img src="/storage/images/user.png" width="40" height="40" >
                            <span class="">Profile</span>
                        </div>
                    </a>
                    <div class="collapse submenu list-unstyled eq-animated eq-fadeInUp" id="more" data-parent="#topAccordion">
                        <div class="submenu-scroll">
                            <ul class="list-unstyled">
                                <li>
                                   
                                    <ul class="list-unstyled sub-submenu collapse show eq-animated eq-fadeInUp" id="modules"> 
                                        <li>
                                            <a class=" dropdown-item" href="{{route('Appointment.edit',auth()->user()->id )}}"> <b style="font-size: 17px;color:black;">Mon Profil</b></a>
                                        </li>
                                        <li>
                                            <form id="logout-form" action="{{url('/logout')}}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                            <a class=" dropdown-item text-danger" href="{{url('/logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                                <b style="font-size: 17px;">Se déconnecter</b>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>
                            </ul>
            </div>
            </li>

            

        </ul>
    </nav>
</div>
</div>
<!--  END MODERN  -->
<div id="content" class="main-content" style="background-color: #f0f0f0">
  <div class="container" style="background-color: #f0f0f0">
      <div class="page-header">
          <div class="page-title">
              <h3>Modifier <b>Patient</b> </h3>
          </div>
      </div>
      
      

      
      <div class="row">
          <div class="col-lg-12 layout-spacing">
              <div class="statbox widget box box-shadow">
                  <div class="widget-header">
                      <div class="row">
                          <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                              <h4></h4>
                          </div>                                                                        
                      </div>
                  </div>
                  <div class="widget-content widget-content-area">
                      <form action="{{route('admin.update',$patient->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        @method('PATCH')
                        <div class="form-row mb-4">
                              <div class="form-group col-md-6">
                                  <label>nom</label>
                                  <input type="text" class="form-control"  name="nom" value="{{$patient->nom}}">
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="inputPassword4">prenom</label>
                                  <input type="text" class="form-control" name="prenom" value="{{$patient->prenom}}">
                              </div>
                        </div> 

                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                              <label for="inputAddress">Email</label>
                              <input type="email" class="form-control" name="email" value="{{$patient->email}}">
                            </div>
                            <div class="form-group col-md-6">
                              <label >Date de prender rendez-vous</label>
                              <input type="date" class="form-control" name="dateN" value="{{$patient->dateN}}" min="{{ now()->format('Y-m-d') }}"  @foreach($disabledDays as $disabledDay){{ 'disabledDates[]=' . $disabledDay . '&' }}@endforeach>
                          </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                              <label >ville</label> <br>
                              <select class="selectpicker form-control" name="ville" data-live-search="true" id="villeSelect">
                                @foreach ($villes as $ville)
                                    <option value="{{$ville->id}}" @if ($patient->ville == $ville->id)  selected @endif>{{$ville->ville}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group col-md-6">
                                  <label>Telephone</label>
                                  <input type="text" name="telephone" class="form-control"  value="{{$patient->telephone}}" >
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="form-group col-md-6 ">
                                <label >hopital</label> <br>
                                 <select class="form-control"  id="hopitalselect" name="hopital_id">
                                   @foreach ($hopitals as $hopital)
                                     <option value="{{$hopital->id}}" @if ($patient->hopital_id == $hopital->id)  selected @endif >{{$hopital->nom}}</option>
                                   @endforeach
                                 </select>
                               </div>
                                <div class="form-group col-md-6">
                                  <label for="inputState">service</label>
                                  <select  class="form-control" id="selectService" name="service_id">
                                      @foreach ($services as $item)
                                      <option value="{{$item->id}}" @if ($patient->service_id == $item->id)  selected @endif> {{$item->nom}}  </option>
                                      @endforeach
                                  </select>
                                </div>
                                
                        </div >
                          
                              
                        <button type="submit" class="btn btn-button-7 mb-4 mt-3">Enregistrer</button>
                      </form>
                  </div>
                  @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
    
            <p> Veuillez remplir tous les champs</p>
          </ul>
        </div>
     @endif

              </div>
          </div>
      </div>

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
        $('#villeSelect').on('change', function() {
    var villeid = $(this).val();

    $('#hopitalselect').empty();

    $.ajax({
        url: '/Appointment/hopital-get',
        type: 'POST',
        data: {villeid: villeid},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        success: function(response) {
            $('#hopitalselect').empty();
            var options = response.map(function(hopital) {
                return '<option value="' + hopital.id + '">' + hopital.nom + '</option>';
            });

            $('#hopitalselect').append(options);
        },
        error: function(xhr) {
            console.log('An error occurred while fetching the cities. Status: ' + xhr.status);
        }
    });
});
//service 
$('#hopitalselect').on('change click', function() {
    var serviceid = $(this).val();

    $('#selectService').empty();

    $.ajax({
        url: '/Appointment/service-get',
        type: 'POST',
        data: {serviceid: serviceid},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        success: function(response) {
            $('#selectService').empty();
            var options = response.map(function(service) {
                return '<option value="' + service.id + '">' + service.nom + '</option>';
            });

            $('#selectService').append(options);
        },
        error: function(xhr) {
            console.log('An error occurred while fetching the cities. Status: ' + xhr.status);
        }
    });
});
 
   
    </script>

@endsection