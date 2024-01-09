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
    
   <!--  BEGIN CONTENT PART  -->
   <div id="content" class="main-content" style="background-color: #f0f0f0">
    <div class="container" style="background-color: #f0f0f0">
        <div class="page-header">
            <div class="page-title">
               
            </div>
        </div>

        <div class="row layout-spacing">

            <div class="col-xl-3 mb-xl-0 col-lg-6 mb-4 col-md-6 col-sm-6">
                <div class="widget-content-area  data-widgets br-4">
                    <div class="widget  t-sales-widget">
                        <div class="media">
                            <div class="icon ml-2">
                                <img src="/storage/images/stethoscope.png" width="70" height="70" >
                            </div>
                            <div class="media-body text-right">
                                <p class="widget-text mb-0">Medecins</p>
                                <p class="widget-numeric-value">{{$countmedecins}}</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-xl-3 mb-xl-0 col-lg-6 mb-4 col-md-6 col-sm-6">
                <div class="widget-content-area  data-widgets br-4">
                    <div class="widget  t-order-widget">
                        <div class="media">
                            <div class="icon ml-2">
                                <img src="/storage/images/technical-support.png" width="70" height="70" >

                            </div>
                            <div class="media-body text-right">
                                <p class="widget-text mb-0">Services</p>
                                <p class="widget-numeric-value"> {{$countservice}} </p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-sm-0 mb-4">
                <div class="widget-content-area  data-widgets br-4">
                    <div class="widget  t-customer-widget">
                        <div class="media">
                            <div class="icon ml-2">
                                <img src="/storage/images/patient.png" width="70" height="70" >
                            </div>
                            <div class="media-body text-right">
                                <p class="widget-text mb-0">Patients</p>
                                <p class="widget-numeric-value"> {{$countpatient}} </p>
                            </div>
                        </div>
                        <p class="widget-total-stats mt-2" style="height: 20px;"></p>
                       
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                
                <div class="widget-content-area  data-widgets br-4">
                    <div class="widget  t-income-widget">
                        <div class="media">
                            <div class="icon ml-2">
                                <img src="/storage/images/hospital.png" width="70" height="70" >
                            </div>
                            <div class="media-body text-right">
                                <p class="widget-text mb-0">Hopitals</p>
                                <p class="widget-numeric-value"> {{$counthospital}} </p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
            
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                    <div class="statbox widget box">
                        <div class="widget-header ">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Liste Medecins</h4>
                                </div>                 
                            </div>
                        </div>

                        <div class="widget-content-area ">

                            <div class="table-responsive new-products">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Cin</th>
                                            <th >Specialite</th>
                                            <th>telephone</th>
                                            <th>service</th>
                                            <th>status</th>
                                            <th>pdf</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($doctors as $item)
                                <tr>
                                    <td> {{$item->nom}} </td>
                                    <td> {{$item->prenom}} </td>   
                                    <td> {{$item->cin}} </td>
                                    <td> {{$item->specialite}} </td>
                                    <td> {{$item->telephone}} </td>
                                    <td> {{$item->nom_service}} </td>
                                    <td>
                                        <div class="toolbar">
                                            <div class="toolbar-toggle">...</div>
                                            <ul class="toolbar-dropdown animated fadeInUp table-controls list-inline">
                                                <li class="list-inline-item"><a class="show-medecin bs-tooltip" data-doctor-id="{{$item->id}}" data-original-title="View" onclick="showMedecin({{$item->id}})" style="text-decoration: none;"><i class="flaticon-view-3"></i></a>

                                                </li>
                                                <li class="list-inline-item"><a href="{{route('doctor.edit',$item->id)}}" class="bs-tooltip" data-original-title="Edit" style="text-decoration: none;"><i class="flaticon-edit-5"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <form action="{{route('doctor.destroy',$item->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                      <button type="submit" style="outline: none;border:none;background-color:#fff;"> <i class="flaticon-delete-6"></i></button>
                                                  </form>
                                                    
                                                </li>
                                                
                                                
                                            </ul>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('medecin.pdf', ['id' => $item->id]) }}">Print PDF</a>

                                    </td>
                                </tr>
                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="pagination-section">
                                <ul class="pagination pagination-style-1 pagination-rounded justify-content-end mt-3 mb-3">
                                    <li><a href="javascript:void(0);">«</a></li>
                                    <li><a href="javascript:void(0);">1</a></li>
                                    <li><a href="javascript:void(0);">2</a></li>
                                    <li><a href="javascript:void(0);">3</a></li>
                                    <li><a href="javascript:void(0);">4</a></li>
                                    <li><a href="javascript:void(0);">5</a></li>
                                    <li><a href="javascript:void(0);">»</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
             </div>

            
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--  END CONTENT PART  -->


    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-0">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Information de Medecin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><span class="icon-close2"></span></span>
        </button>
        </div>
        <div class="modal-body">
            <p  > Id: <span class="id"> </span></p>
            <p  > nom: <span class="nom"> </span></p>
            <p  > prenom: <span class="prenom"> </span></p>
            <p  > cin: <span class="cin"> </span></p>
            <p  > service: <span class="service"> </span></p>
            <p  > specialite: <span class="specialite"> </span></p>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">fermer</button>
            
          </div>
        </div>
        </div>
        
        </div>

<!-- END MAIN CONTAINER -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function showMedecin(doctorId) {
    var doctorModal = $('#showModal');
    // Perform AJAX request to fetch doctor information
    $.ajax({
        url: '/doctor/' + doctorId,
        method: 'GET',
        success: function(response) {
            // Populate the modal with the doctor information
            doctorModal.find('.id').text(response.id);
            doctorModal.find('.nom').text(response.nom);
            doctorModal.find('.prenom').text(response.prenom);
            doctorModal.find('.cin').text(response.cin);
            doctorModal.find('.service').text(response.services.nom);
            doctorModal.find('.specialite').text(response.specialite);

            doctorModal.modal('show');
        },
        error: function(error) {
            console.log(error);
        }
    });
}
</script>
@endsection