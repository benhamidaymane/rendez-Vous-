@extends('layouts.defaultA')
@section('content_title_admin')  Hopitals   @endsection
@section('content_header')
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
       <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
          <div class="d-flex justify-content-between"> <div> <h1 >liste les hopitals </h1></div> <div> <button class="btn btn-link"> <a href="{{route('hopital.create')}}">Ajouter </a></button></div></div>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                
                       <table class="table table-bordered table-striped table-hover" width='100%'>
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">nom</th>
                                <th>adress</th>
                                <th>email</th>
                                <th>phone</th>
                                <th scope="row">action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hopitals as $item)
                                <tr>
                                    <td> {{$item->nom}} </td>
                                    
                                    <td> {{$item->adress}} </td>
                                    <td> {{$item->email}} </td>
                                    <td> {{$item->phone}} </td>
                                    <td colspan="2">
                                        <form action="{{route('hopital.destroy',$item->id)}}" method="post" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                        <button class="btn btn-outline-danger "> supprimer</button>
                                        </form>
                                        <button class="btn btn-outline-secondary"> <a class="link-light link-offset-0 link-underline-opacity-0 link-underline-opacity-0-hover text-secondary dropdown-item" href="{{route('hopital.edit',$item->id)}}">Modifier</a> </button>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
             
                       </table>
                
            </div>
        </div>
    </section>
@endsection
