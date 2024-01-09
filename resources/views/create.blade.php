@extends('layouts.defaultC')
@section('content_head') rendez-vous @endsection

@section('content_client')
<!-- ======= Appointment Section ======= -->
<section id="appointment" class="appointment section-bg">
    <div class="container">



      <div class="section-title">
        <p style="height: 110px;"></p>
        <h2>Prender Rendez-Vous </h2>
    
    </div>
    <form method="post" class="form-group" id="pdfForm" enctype="multipart/form-data">

        @csrf
        <div class="row">
          <div class="col-md-4 form-group  mt-3">
        <input type="text" name="nom" class="form-control" id="nom" placeholder="nom">
        <div class="validate">
          
        </div>
          </div>
          <div class="col-md-4 form-group  mt-3">

        <input type="text" name="prenom" class="form-control" id="prenom" placeholder="prenom">
        <div class="validate">
          
        </div>
            </div>
            <div class="col-md-4 form-group mt-3 ">
        
                <input type="email" name="email" class="form-control" id="email" placeholder="email" >
                <div class="validate">
                  
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4 form-group  mt-3">
            <select name="region" id="regionSelect" class="form-select">
              <option value="">select region</option>
              @foreach ($regions as $item)
                  <option value="{{$item->id}}"> {{$item->region}} </option>
              @endforeach
           </select>
          </div>
          
          <div class="col-md-4 form-group mt-3 " >
            <select name="ville" id="villeSelect" class="form-select">
              <option value="">select ville</option>
             @foreach ($villes as $item)
                 <option value="{{$item->id}}"> {{$item->ville}} </option>
             @endforeach
            </select>
            <div class="validate"></div>

          </div>
          <div class="col-md-4 form-group mt-3 ">
                <input type="text" name="adress" class="form-control" id="adress" placeholder="adress" >
                <div class="validate"> </div>
          </div>
            
        </div>
        <div class="row">
          <div class="col-md-4 form-group mt-3 ">
            <select name="hopital_id" id="hopitalselect" class="form-select" >
              <option>select hopital </option>
              @foreach ($hopitals as $item)
                  <option value="{{$item->id}}">{{$item->nom}}</option>
              @endforeach
            </select>
            <div class="validate"> </div>
          </div>
  
          <div class="col-md-4 form-group mt-3 ">
            <select name="service_id" id="selectService" class="form-select ">
              <option value="">Select service</option>
              @foreach ($services as $item)
                  <option value="{{$item->id}}"> {{$item->nom}} </option>
              @endforeach
            </select>
            <div class="validate">  </div>
          </div>
          <div class="col-md-4 form-group mt-3 ">
            <input type="date" name="dateN"  class="form-control datepicker" id="dateN" min="{{ now()->format('Y-m-d') }}"  @foreach($disabledDays as $disabledDay){{ 'disabledDates[]=' . $disabledDay . '&' }}@endforeach >
      <div class="validate"> </div>    
          </div>
  
        </div>
  
    
      
      
      <div class="row">
        <div class="col-md-4 form-group mt-3 ">
          <select name="date" id="" class="form-select" >
            <option>select time </option>
            <option value="08:00">08:00</option>
            <option value="09:00">09:00</option>
            <option value="10:00">10:00</option>
            <option value="11:00">11:00</option>
            <option value="12:00">12:00</option>
            <option value="13:00">13:00</option>
            <option value="14:00">14:00</option>
            <option value="15:00">15:00</option>
          </select>
          <div class="validate"> </div>
        </div>
        <div class="col-md-4 form-group mt-3 ">
         <input type="text" name="telephone" class="form-control" placeholder="telephone">
        </div>

        <div class="col-md-4 form-group mt-3 ">
          <select name="sexe" id="" class="form-select ">
            <option value="">Select sexe</option>
            <option value="masculin">masculin</option>
            <option value="feminin">féminin</option>
          </select>
          <div class="validate">  </div>
        </div>

      </div>


      <div class="form-group mt-3">
        <textarea name="message" id="" cols="30" rows="5" placeholder="Message (Optional)" class="form-control" value="">{{ old('message', 'Default value') }}</textarea>
        <div class="validate"></div>
      </div>
            <br>
            
              <div class="text-center">
                <button type="submit" id="pdfSubmit" class="btn btn-primary">valider rendez-vous</button>

              </div>
       </form>
      <br>
     @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
            
                    <p> Veuillez remplir tous les champs </p>
                  </ul>
                </div>
             @endif
     @if (session('success_patient_create'))
         <div>
            <button></button> 
           </div>
      @endif
     </div>
    </div>
   
</section><!-- End Appointment Section -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
        // Function to disable the date input
        function disableDateInput() {
            var currentDate = new Date().toISOString().split('T')[0];
            $('#dateN').attr('max', currentDate);
            $('#dateN').prop('disabled', true);
        }

        // Function to enable the date input
        function enableDateInput() {
            $('#dateN').removeAttr('max');
            $('#dateN').prop('disabled', false);
        }

        // Event listener for service selection change
        $('#selectService').on('change click', function() {
            var serviceId = $(this).val();
            var hopitalId = $('#hopitalselect').val();
            if (serviceId !== '') {
                $.ajax({
                    url: '/Appointment/patient-count',
                    type: 'POST',
                    data: {
                      serviceId: serviceId,
                      hopitalId: hopitalId 
                    },
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                    dataType: 'json',
                    success: function(response) {
                        if (response.count >= 1) {
                            disableDateInput();
                        } else {
                            enableDateInput();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            } else {
                enableDateInput();
            }
        });
    });
    $('#pdfForm').on('submit', function(event) {
      event.preventDefault(); // Prevent default form submission
      
      // Get form data
      var formData = $(this).serialize();
      
      // Perform AJAX request
      $.ajax({
        url: '/generate-pdf', // Update with the appropriate URL
        type: 'POST',
        data: formData,
        dataType: 'json', // Set the expected response data type
        beforeSend: function() {
          // Display loading indicator or disable the submit button
          $('#pdfSubmit').attr('disabled', 'disabled');
          // Additional handling, if needed
        },
        success: function(response) {
          // Handle the success response
          // 'response' variable contains the JSON response from the server
          if (response.stream) {
            // Display the PDF stream
            var streamUrl = response.stream;
            var streamLink = $('<a>')
              .attr('href', streamUrl)
              .text('Download PDF')
              .addClass('btn btn-success');
            
            // Append the stream link to the form
            $('#pdfForm').append(streamLink);
          }
          
          // Additional handling, if needed
        },
        error: function(xhr, status, error) {
          // Handle the error response
          // Additional handling, if needed
        },
        complete: function() {
          // Remove loading indicator or enable the submit button
          $('#pdfSubmit').removeAttr('disabled');
          // Additional handling, if needed
        }
      });
    });

$('#regionSelect').on('change', function() {
            var regionId = $(this).val();

            $('#villeSelect').empty();

            $.ajax({
                url: '/Appointment/ville-get',
                type: 'POST',
                data: {regionId: regionId},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function(response) {
                  
                    $('#villeSelect').empty();
                    var options = response.map(function(villes) {
                    return '<option value="' + villes.id + '">' + villes.ville + '</option>';

                });

  
            $('#villeSelect').append(options);
                  },
                 error: function(xhr) {
                    console.log('An error occurred while fetching the cities. Status: ' + xhr.status);
                  }
                });

        });

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


    document.addEventListener('DOMContentLoaded', function() {
          var dateInput = document.getElementById('dateN');
          dateInput.addEventListener('input', function() {
          var selectedDate = new Date(dateInput.value);
          var dayOfWeek = selectedDate.getDay();
          
          
          if (dayOfWeek === 6 || dayOfWeek === 0) {
                dateInput.value = ''; 
                alert('Je m excuse pour la confusion. Si vous préférez un autre jour que le week-end, veuillez me préciser quel jour de la semaine vous conviendrait le mieux, et je serai heureux de vous aider. ')
          }
      });
  });
</script>
@endsection

