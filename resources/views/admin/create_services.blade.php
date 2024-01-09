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
              <h3>Ajouter <b>Service</b> </h3>
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
                  <div class="row">
                      <div class="col-md-6 mx-auto">
                          <form  action="{{route('services.store')}}" method="POST" class="form-horizontal form-val-1" >
                               @csrf
                              <div class="control-group mb-4">
                                  <label class="control-label">Nom de service</label>
                                  <div class="controls">
                                      <input type="text" name="nom" class="form-control" required />
                                      <p class="help-block"></p>
                                  </div>
                              </div>
                              <div class="control-group mb-4">
                                <label class="control-label">Image de Service </label>
                                <div class="controls">
                                    <input type="file" class="form-control" name="image" required/>
                                    <p class="help-block"></p>
                                </div>
                            </div>

                              <div class="control-group mb-4">
                                  <label class="control-label">Description de Service</label>
                                  <div class="controls">
                                      <textarea name="description" class="form-control" cols="30" rows="10" required ></textarea>
                                      <p class="help-block"></p>
                                  </div>
                              </div>

                              

                              
                              <div class="control-group mb-4">
                                  
                                <div class="controls">
                                    <input type="hidden" value="{{$users}}" name="hopital_id" class="form-control"  required/>
                                    <p class="help-block"></p>
                                </div>
                            </div>

                              

                              <div class="form-actions mt-5 mb-4">
                                  <button type="submit" class="btn btn-button-7">Ajouter<i class="icon-ok icon-white"></i></button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      </div>

      
      
         

              
  </div>
</div>
@endsection