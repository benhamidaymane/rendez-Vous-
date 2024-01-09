@extends('layouts.defaultM')
@section('content_medecin_title') show @endsection
@section('content_medecin')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="text-center mt-5">FullCalendar js Laravel series with Career Development Lab</h3>
            <div class="col-md-11 offset-1 mt-5 mb-5">

                <div>
                    <ul>
                        <li> {{$patient->nom}} </li>
                        <li> {{$patient->id}} </li>
                        <li> {{$patient->prenom}} </li>
                        <li> {{$patient->nom}} </li>
                        <li> {{$patient->nom}} </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection