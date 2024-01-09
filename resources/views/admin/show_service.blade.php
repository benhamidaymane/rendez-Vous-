@extends('layouts.defaultA')
@section('content_title_admin') affichage service {{$service->nom}}   @endsection
@section('content_admin')

<section class="py-5">
    <div class="container  ">
        <div class="row  justify-content-center">
            
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 shadow p-3 mb-5 bg-white rounded">
            <div class="card mb-3">
                <img class="card-img-top" src="/storage/images/{{$service->image}}" alt="Card image cap" width="300" height="300px">
                <div class="card-body">
                  <h5 class="card-title">nom de service  : <br> <b>{{$service->nom}}  </b></h5>
                  <p class="card-text"> description de service : <br> <i>{{$service->description}}</i></p>
                  
                  <div class="float-righ">
                    <button class="btn btn-secondary " >  <a class="link-light link-offset-0 link-underline-opacity-0 link-underline-opacity-0-hover dropdown-item" href="{{route('services.edit',$service->id)}}">modifier</a></button>
                </div>
                </div>
                
              </div>
            </div>
              
        </div>
    </div>
@endsection