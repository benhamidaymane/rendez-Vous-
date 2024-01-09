@extends('layouts.defaultA')
@section('content_title_admin') edit hopital     @endsection
@section('content_admin')

<section class="py-5">
    <div class="container  ">
        <div class="row  justify-content-center">
            
            <div>
                <h2> Modifier hopital </h2>
            </div>
            <form action="{{route('hopital.update',$hopital->id)}}" method="post"  width='100%' class="shadow p-3 mb-5 bg-white rounded" >
                @csrf
                @method('PATCH')
                <div class="row">
                  <div class="col-md-4 form-group  mt-3">
                <input type="text" name="nom" class="form-control" id="nom" placeholder="nom" value="{{$hopital->nom}}">
                
                  </div>
                  <div class="col-md-4 form-group  mt-3">
            
                <input type="text" name="adress" class="form-control" id="adress" placeholder="adress" value="{{$hopital->adress}}">
                
                    </div>
                    <div class="col-md-4 form-group mt-3 ">
                
                        <input type="email" name="email" class="form-control" id="email" placeholder="email" value="{{$hopital->email}}" >
                        <div class="validate"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group mt-3 ">
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="phone"  value="{{$hopital->phone}}">
                        <div class="validate"></div>
                    </div>
              
                    <br>
                    
                      <div class="text-center"> <br>
                <button type="submit"  class="btn btn-primary">Enregistrer</button>
                      </div>
            </form>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                
                <p> Veuillez remplir tous les champs </p>
            </ul>
        </div>
    @endif
    </div>
@endsection