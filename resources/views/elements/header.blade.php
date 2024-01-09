<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top">
      <div class="container d-flex justify-content-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope"></i> <a href="mailto:myAppointment@gmail.com">myAppointment@gmail.com</a>
          <i class="bi bi-phone"></i> +212 66650233
        </div>
        <div class="d-none d-lg-flex social-links align-items-center">
          <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
        </div>
      </div>
    </div>
  
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
      <div class="container d-flex align-items-center" >
  
        <div class="logo me-auto"><a class="navbar-brand" href="{{route('Appointment.index')}}"><img src="/storage/images/logoadmin.png" alt="logo" width="180px" height="70px"></a></div>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
  
        <nav id="navbar" class="navbar order-last order-lg-0">
          
<ul>
    <li><a class="nav-link scrollto active" href="{{route('Appointment.index')}}">Home</a></li>
    <li><a class="nav-link scrollto" href="{{route('Appointment.index')}}#about">About</a></li>
    <li><a class="nav-link scrollto" href="{{route('Appointment.index')}}#services">Services</a></li>
    <li><a class="nav-link scrollto" href="{{route('Appointment.index')}}#doctors">Doctors</a></li>
   
    <li><a class="nav-link scrollto" href="{{route('Appointment.index')}}#contact">Contact</a></li>
  </ul>

          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
  
        <a href="{{route('Appointment.create')}}" class="appointment-btn scrollto"><span class="d-none d-md-inline">prendre</span> Rendez-Vous</a>
  
      </div>
      @if(session('status') == 'success')
      <div class="alert alert-success">
          Submission successful.
      </div>
  
      @if(session('pdfPath'))
          <a href="{{ route('downloadPDF') }}" class="btn btn-primary">Download PDF</a>
      @endif
  @endif
    </header><!-- End Header -->
  