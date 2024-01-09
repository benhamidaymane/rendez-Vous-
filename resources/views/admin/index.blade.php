@extends('layouts.defaultA')
@section('content_title_admin')   Accuiel  @endsection
@section('content_header')
<!-- ======= Counts Section ======= -->
<section id="counts" class="counts">
  <div class="container">

    <div class="row" style="150px">

      <div class="col-lg-3 col-md-6">
        <div class="count-box">
          <i class="fas fa-user-md"></i>
          <span data-purecounter-start="0" data-purecounter-end="{{$countmedecins}}" data-purecounter-duration="1" class="purecounter"> </span>
          <p>Doctors</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
        <div class="count-box">
          <i class="far fa-hospital"></i>
          <span data-purecounter-start="0" data-purecounter-end="{{$counthospital}}" data-purecounter-duration="1" class="purecounter"></span>
          <p>Hospitals</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
        <div class="count-box">
          <i class="bi bi-check2-circle"></i>
          <span data-purecounter-start="0" data-purecounter-end="{{$countservice}}" data-purecounter-duration="1" class="purecounter"></span>
          <p>Services</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
        <div class="count-box">
          <i class="bi bi-person"></i>
          <span data-purecounter-start="0" data-purecounter-end="{{$countpatient}}" data-purecounter-duration="1" class="purecounter"></span>
          <p>Patients</p>
        </div>
      </div>

    </div>

  </div>
</section>
@endsection
@section('content_admin')
       <!-- Section-->
       <section class="py-2">
        <div class="container px-4 px-lg-5 mt-5">
          <div class="d-flex justify-content-between">
             <div> <h1 >liste les patients </h1></div>
             <div>
              <form action="{{'/search'}}" method="post">
                @csrf
                <div class="input-group mb-3">
                  <input type="text" name="search" class="form-control"  placeholder='Rechercher par id '>
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" >Rechercher</button>
                  </div>
                </div>
             </form>
             </div>
        
          </div>
          <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
            
                    <p> Veuillez remplir le champ </p>
                  </ul>
                </div>
             @endif
          </div>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                
                       <table class="table table-bordered table-striped table-hover" width='100%'>
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
  
                                <th scope="col"  >Date de rendez-vous</th>
                                <th scope="col">L'heure de rendez-vous</th>
                                <th scope="col"> Nom hopital </th>
                                <th scope="col">Nom service</th>
                                <th scope="col">Sexe</th>
                                
                                <th scope="col" >Date de rendez_vous</th>
                                <th scope="row" width='200px' colspan="2">Action</th>
                            </tr>
                        </thead>
                        <a  href="{{route('admin.edit',$item->id)}}">Modifier</a>                               <td>
                                                <div class="toolbar">
                                                    <div class="toolbar-toggle">...</div>
                                                    <ul class="toolbar-dropdown animated fadeInUp table-controls list-inline">
                                                        <li class="list-inline-item"><a href="javascript:void(0);" class="bs-tooltip" data-original-title="View"><i class="flaticon-view-3"></i></a>
                                                        </li>
                                                        <li class="list-inline-item"><a href="javascript:void(0);" class="bs-tooltip" data-original-title="Edit"><i class="flaticon-edit-5"></i></a>
                                                        </li>
                                                        <li class="list-inline-item"><a href="javascript:void(0);" class="bs-tooltip" data-original-title="Remove"><i class="flaticon-delete-6"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>                       <tbody>
                            @foreach ($patients as $item)
                                <tr>
                                    <td> {{$item->patient_nom}} </td>
                                    <td> {{$item->prenom}} </td>   
                                    <td> {{$item->dateN}} </td>
                                    <td> {{$item->date}} </td>
                                    <td> {{$item->hopital_nom}} </td>
                                    <td> {{$item->service_nom}} </td>
                                    <td> {{$item->sexe}} </td>
                                    
                                    <td> {{$item->created_at}} </td>
                                    <td colspan="2">
                                        
                                      <div style="display:inline-block;">  <button class="btn btn-outline-secondary" width='70px'><a class="link-light link-offset-0 link-underline-opacity-0 link-underline-opacity-0-hover text-secondary dropdown-item" href="{{route('admin.edit',$item->id)}}">Modifier</a></button></div>
                                        <button class="btn btn-outline-success" width='70px'><a class="link-light link-offset-0 link-underline-opacity-0 link-underline-opacity-0-hover text-success dropdown-item" href="{{route('admin.show',$item->id)}}">Détails</a></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
             
                       </table>
                
            </div>
           <div width='300'>
           
           </div>
        </div>
        <div class="d-flex justify-content-center mt-4" style="height: 60px;">
          {{ $patients->links() }}
        </div>
        <div style="height: 50px;">

        </div>
    </section>
    
@endsection
