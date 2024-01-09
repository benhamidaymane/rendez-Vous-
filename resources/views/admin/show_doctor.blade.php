@extends('layouts.defaultA')
@section('content_title_admin')  Doctor  {{$doctor->nom }}    @endsection
@section('content_admin')

<section class="py-1">
    <div class="container ">
        <div class="row  justify-content-center">
            
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 shadow p-3 mb-5 bg-white rounded">
                <div class="card" style="width: 28rem;">
                  <img class="card-img-top" src="/storage/images/{{$doctor->image}}" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title" > nom comple de doctor :  <b>{{$doctor->nom }} {{$doctor->prenom}}</b></h5>
                    <h5 class="card-title"> CIN de doctor :  <b>{{$doctor->cin }}</b></h5>
                    <h5 class="card-title"> telephone de doctor:  <b>{{$doctor->telephone}}</b> </h5>
                    <h5 class="card-title"> specialite de doctor:  <b>{{$doctor->specialite}} </b></h5>
                    
                  </div>
                  <button class="btn btn-dark">  <a class="link-light link-offset-0 link-underline-opacity-0 link-underline-opacity-0-hover" href="{{route('doctor.edit',$doctor->id)}}">modifier</a></button>
                </div>
                
                
              </div>
              
        </div>
     

    </div>
@endsection