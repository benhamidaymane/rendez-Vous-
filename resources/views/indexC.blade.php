@extends('layouts.defaultC')
@section('content_head') Accuiel @endsection

@section('content_client')
      <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Bienvenue a My Appointment</h1>
      <h2>Facilitez vos rendez-vous en ligne avec notre hôpital</h2>
      <a href="#about" class="btn-get-started scrollto">Commencer</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us" style="height: 200px;">
  
    </section><!-- End Why Us Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
            
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3> Propos de notre site appelée My Appointment</h3>
            <p>Notre application afin d'obtenir un rendez-vous dans un hôpital près de chez vous.</p>

            <div class="icon-box">
              <div class="icon"><i class="bi bi-card-heading"></i></div>
              <h4 class="title">Le Site </h4>
              <p class="description">Notre application est basée sur un grand nombre de logiciels,Elle est simple d'utilisation et a des objectifs à atteindre</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bi bi-building-check"></i></div>
              <h4 class="title">Raison d'appeler</h4>
              <p class="description">Ce  site web l'a fait par deux stagiaires  nommé my apparemment Parce qu'elle est similaire à la fameuse application mon rendez-vous.</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bi bi-person-lines-fill"></i></div>
              <h4 class="title">nous contacter</h4>
              <p class="description">Si vous avez des suggestions ou des commentaires concernant notre équipe ou nos services, n'hésitez pas à nous contacter les informations de nous et sur contact nous</p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="fas fa-user-md"></i>
              <span data-purecounter-start="0" data-purecounter-end="{{$countmedecins}}" data-purecounter-duration="1" class="purecounter"> </span>
              <p> Medcins</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="far fa-hospital"></i>
              <span data-purecounter-start="0" data-purecounter-end="{{$counthospital}}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hopitals</p>
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
              <i class="fas fa-award"></i>
              <span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1" class="purecounter"></span>
              <p>Récompenses</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
          
        </div>

        <div class="row">
          @foreach ($services as $item)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="card" style="width: 26rem;">
              <img class="card-img-top" src="/storage/images/{{$item->image}}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">{{$item->nom}}</h5>
                <p class="card-text">{{$item->description}}</p>
                
              </div>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors">
      <div class="container">

        <div class="section-title">
          <h2>Doctors</h2>
        
        </div>

        <div class="row">

         @foreach ($doctores as $doctore)
         <div class="col-lg-6 mt-4 mt-lg-0">
          <div class="member d-flex align-items-start">
            <div class="pic"><img src="/storage/images/{{$doctore->image}}" class="img-fluid" alt=".." ></div>
            <div class="member-info">
              <h4>{{$doctore->nom}}</h4>
              <span>{{$doctore->specialite}}</span>
              <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
              <div class="social">
                <a href=""><i class="ri-twitter-fill"></i></a>
                <a href=""><i class="ri-facebook-fill"></i></a>
                <a href=""><i class="ri-instagram-fill"></i></a>
                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
              </div>
            </div>
          </div>
        </div>
         @endforeach

        </div>

      </div>
    </section><!-- End Doctors Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    
       

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
        
        </div>
      </div>

      <div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3315.69745401232!2d-7.160921382556151!3d33.7943102!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7a66a166cfcb9%3A0xaa4fa1f68b05bceb!2sISTA%20-%20OFPPT%20-%20BOUZNIKA!5e0!3m2!1sfr!2sma!4v1685048345237!5m2!1sfr!2sma" style="border:0; width: 100%; height: 350px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

      <div class="container">
        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Localisation:</h4>
                <p>A108 rue bouznika , benslimane,Maroc</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>myAppointment@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Telephone:</h4>
                <p>+213 66650233</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="{{route('contacts.store')}}" method="post" class="form">
              @csrf
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Votre nom complet" >
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="  Votre Email" >
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet" >
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="  Votre commentaire" ></textarea>
              </div>
              <div class="my-3">
                @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
                @if (session('success'))
                  <div class="alert alert-success">
                       {{ session('success') }}
                  </div>
                @endif
                
                
              </div>
              <div class="text-center"><button type="submit" class="btn btn-primary">Envoyer Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
@endsection