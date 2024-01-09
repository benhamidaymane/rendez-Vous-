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
              <h3>Contact</h3>
          </div>
      </div>                
      
      <div class="row layout-spacing" style="width: 136%">
          
          <div class="col-xl-9 col-lg-8 col-md-8">
              <div class="inbox-section">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="row mb-4">
                              <div class="col-md-9 col-6">
                                  <h4 class="heading-title">box mail</h4>
                              </div>
                              <div class="col-md-3 col-6">
                                  <div class="form-group search">
                                    <nav class="mail-pagination" aria-label="Page navigation example">
                                      <ul class="pagination">
                                          <li class="page-item non-hover">
                                             
                                          </li>
                                          <li class="page-item">
                                              <a class="page-link" href="#" aria-label="Previous">
                                                 
                                                  
                                              </a>
                                          </li>
                                          <li class="page-item">
                                              <a class="page-link br-0" href="#" aria-label="Next">
                                                  
                                                  
                                              </a>
                                          </li>
                                      </ul>
                                  </nav>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 mb-4">
                          <div class="inbox-options">
                              <ul class="list-inline">
                                  <li class="list-inline-item">
                                      <div class="chk-all">
                                          

                                          <div class="dropdown float-right">
                                              <div role="menu" class="dropdown-toggle" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> </div>
                                              
                                          </div>
                                      </div>
                                  </li>
                                  <li class="list-inline-item"></li>
                                  <li class="list-inline-item"></li>
                                  <li class="list-inline-item">
                                      <div class="dropdown">
                                          
                                      </div>
                                  </li>
                                  <li class="list-inline-item"></li>
                                  <li class="list-inline-item">
                                      
                                  </li>
                              </ul>
                          </div>
                       </div>
                      <div class="col-xl-3 ml-auto col-lg-12 col-md-12 col-sm-12 mb-4">
                          
                      </div>
                      <div class="col-md-12">
                          <div class="table-responsive mb-5">
                              <table class="table mb-0">
                                  <tbody>
                                      @foreach ($contacts as $contact)
                                      <a href="{{route('contacts.show',$contact->id)}}">
                                        
                                        
                                        <td>
                                          <a href="{{ route('contacts.show', $contact->id) }}" id="mail-link" class="mail-link{{ $contact->status == 0 ? ' font-weight-bold' : '' }}text-decoration-none" onclick="updateContactStatus({{ $contact->id }})" style="font-size: 10; font-family:none;">
                                            <img alt="admin-profile" src="/storage/images/no_image5654df8zs54@.png" class="">
                                        </a>
                                        </td>
                                        <td>
                                            <a href="{{route('contacts.show', $contact->id)}}" id="mail-link" class="mail-link text-decoration-none text-dark " onclick="updateContactStatus({{ $contact->id }}) "style="font-size: 10;">
                                              <span class="{{ $contact->status == 0 ? 'message-head message-new' : 'message-head message-read' }}">
                                                {{ $contact->name }}: {{ $contact->subject }} -</span> </a>
                                            <span class="message-body{{ $contact->status == 0 ? 'message-dot message-new' : 'message-dot message-read' }}">Fichier exécuté<span class="{{ $contact->status == 0 ? 'message-dot message-new' : 'message-dot message-read' }}">...</span></span></a>
                                        </td>
                                        <td>
                                            <a href="{{route('contacts.show',$contact->id)}}"  id="mail-link" class="mail-link text-decoration-none"><span>{{$contact->created_at}}</span></a>
                                        </td>
                                        </tr>
                                      </a>
                                      @endforeach
                                      
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!--  END CONTENT PART  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  function updateContactStatus(contactId) {
      $.ajax({
          type: 'POST',
          url: '/contacts/' + contactId + '/status',
          data: {
              _token: '{{ csrf_token() }}',
              status: 1
          },
          success: function(response) {
              // Handle success response
              console.log(response);
              // Update the style if needed
              $('.mail-link[data-contact-id="' + contactId + '"]').removeClass('font-weight-bold');
          },
          error: function(xhr) {
              // Handle error response
              console.log(xhr.responseText);
          }
      });
  }
</script>

@endsection