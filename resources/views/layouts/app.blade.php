<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="SHORTCUT ICON" href="{{ asset('img/faviconUTC.ico') }}" type="image/x-icon" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="{{ asset('dist/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('fonts/font.css') }}" rel="stylesheet" type="text/css">
  

  <!-- Plugin CSS -->
  <link href="{{asset('dist/vendor/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="{{ asset('dist/css/freelancer.min.css') }}" rel="stylesheet">
  
  <link rel="stylesheet" href="{{ asset('pus/sweet/sweetalert.css') }}">
  <script src="{{ asset('pus/sweet/sweetalert.min.js') }}"></script>

<link rel="stylesheet" href="{{ asset('pus/DataTables/datatables.css') }}">


<script src="{{ asset('pus/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('pus/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js') }}"></script>

<link rel="stylesheet" href="{{ asset('pus/dist/css/bootstrap-select.min.css') }}">
<script src="{{ asset('pus/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('pus/dist/js/i18n/defaults-es_ES.js') }}"></script>

<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
</head>


<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
    <div class="container-fluid">
      <a class="navbar-brand js-scroll-trigger" href="{{ url('/') }}#page-top">{{ config('app.name', 'Laravel') }}</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        

        <ul class="navbar-nav ml-auto">
        

           @guest


                 <li class="nav-item ">
                    <a class="nav-link  rounded js-scroll-trigger" href="{{ url('/') }}#portfolio">Módulos</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link  rounded js-scroll-trigger" href="{{ url('/') }}#about">Acerca de</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link  rounded js-scroll-trigger" href="{{ url('/') }}#contact">Contactos</a>
                  </li>
                <li class="nav-item ">
                    <a class="nav-link  rounded js-scroll-trigger btn-success" href="{{ route('login') }}">{{ __('INGRESAR') }}</a>
                </li>
              {{--   @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif --}}


                 
            @else

              <li class="nav-item ">
                    <a class="nav-link  rounded js-scroll-trigger" id="m_home" href="{{ route('home') }}">INICIO</a>
                </li>
                  <li class="nav-item ">
                    <a class="nav-link  rounded js-scroll-trigger" id="m_odernes" href="{{ route('ordenes') }}">AGREGAR ORDEN</a>
                </li>
                   <li class="nav-item ">
                    <a class="nav-link  rounded js-scroll-trigger" id="m_historial" href="{{ route('historial') }}">HISTORIAL</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link  rounded js-scroll-trigger" id="m_autos" href="{{ route('autos') }}">Vehículos</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link  rounded js-scroll-trigger" id="m_servicios" href="{{ route('servicios') }}">SERVICIOS</a>
                </li>
              

             

                <li class="nav-item  dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle  rounded js-scroll-trigger" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                       {{ Auth::user()->email }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('SALIR') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest

        </ul>

        


      </div>
    </div>
  </nav>

<section>
@if ($errors->any())

  <div class="alert alert-danger alert-dismissible alert-styled-left fade show" role="alert" >
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
      </strong>
  </div> 

@endif

@foreach (['success', 'warning', 'info', 'error'] as $msg)
    @if(Session::has($msg))
    <script>
      swal("", "{{ Session::get($msg) }}", "{{ $msg }}")

    </script>
    @endif
@endforeach


 @yield('content')

</section>

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Ubicación</h4>
          <p class="lead mb-0">SAN FELIPE
            <br>LATACUNGA-ECUADOR</p>
        </div>
        <div class="col-md-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Alrededor de la web</h4>
          <ul class="list-inline mb-0">
            <li class="list-inline-item">
              <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                <i class="fab fa-fw fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                <i class="fab fa-fw fa-google-plus-g"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                <i class="fab fa-fw fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                <i class="fab fa-fw fa-linkedin-in"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                <i class="fab fa-fw fa-dribbble"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <h4 class="text-uppercase mb-4">GRATIS</h4>
          <p class="lead mb-0">Sistema web MANTENIMIENTO DE VEHICULOS desarrollado por <br>
            <a href="http://utc.edu.ec">EQUIPO DE MAESTRÍA EN S.I DE LA UTC</a>.</p>
        </div>
      </div>
    </div>
  </footer>

  <div class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; {{ config('app.name','UTC') }} {{ date('Y') }}</small>
    </div>
  </div>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>

  <!-- Portfolio Modals -->

  <!-- Portfolio Modal 1 -->
  <div class="portfolio-modal mfp-hide" id="portfolio-modal-1">
    <div class="portfolio-modal-dialog bg-white">
      <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
        <i class="fa fa-3x fa-times"></i>
      </a>
      <div class="container text-center">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2 class="text-secondary text-uppercase mb-0">MÓDULO AUTO</h2>
            <hr class="star-dark mb-5">
            <img class="img-fluid mb-5" src="{{ asset('dist/img/portfolio/cabin.png') }}" alt="">
            <p class="mb-5">
                MÓDULO GRATUITO
            </p>
            <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
              <i class="fa fa-close"></i>
              CERRAR PROYECTO</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Portfolio Modal 2 -->
  <div class="portfolio-modal mfp-hide" id="portfolio-modal-2">
    <div class="portfolio-modal-dialog bg-white">
      <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
        <i class="fa fa-3x fa-times"></i>
      </a>
      <div class="container text-center">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2 class="text-secondary text-uppercase mb-0">MÓDULO AUTO</h2>
            <hr class="star-dark mb-5">
            <img class="img-fluid mb-5" src="{{ asset('dist/img/portfolio/cabin.png') }}" alt="">
            <p class="mb-5">
                MÓDULO GRATUITO
            </p>
            <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
              <i class="fa fa-close"></i>
              CERRAR PROYECTO</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Portfolio Modal 3 -->
  <div class="portfolio-modal mfp-hide" id="portfolio-modal-3">
    <div class="portfolio-modal-dialog bg-white">
      <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
        <i class="fa fa-3x fa-times"></i>
      </a>
      <div class="container text-center">
         <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2 class="text-secondary text-uppercase mb-0">MÓDULO AUTO</h2>
            <hr class="star-dark mb-5">
            <img class="img-fluid mb-5" src="{{ asset('dist/img/portfolio/cabin.png') }}" alt="">
            <p class="mb-5">
                MÓDULO GRATUITO
            </p>
            <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
              <i class="fa fa-close"></i>
              CERRAR PROYECTO</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Portfolio Modal 4 -->
  <div class="portfolio-modal mfp-hide" id="portfolio-modal-4">
    <div class="portfolio-modal-dialog bg-white">
      <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
        <i class="fa fa-3x fa-times"></i>
      </a>
      <div class="container text-center">
         <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2 class="text-secondary text-uppercase mb-0">MÓDULO AUTO</h2>
            <hr class="star-dark mb-5">
            <img class="img-fluid mb-5" src="{{ asset('dist/img/portfolio/cabin.png') }}" alt="">
            <p class="mb-5">
                MÓDULO GRATUITO
            </p>
            <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
              <i class="fa fa-close"></i>
              CERRAR PROYECTO</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Portfolio Modal 5 -->
  <div class="portfolio-modal mfp-hide" id="portfolio-modal-5">
    <div class="portfolio-modal-dialog bg-white">
      <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
        <i class="fa fa-3x fa-times"></i>
      </a>
      <div class="container text-center">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2 class="text-secondary text-uppercase mb-0">MÓDULO AUTO</h2>
            <hr class="star-dark mb-5">
            <img class="img-fluid mb-5" src="{{ asset('dist/img/portfolio/cabin.png') }}" alt="">
            <p class="mb-5">
                MÓDULO GRATUITO
            </p>
            <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
              <i class="fa fa-close"></i>
              CERRAR PROYECTO</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Portfolio Modal 6 -->
  <div class="portfolio-modal mfp-hide" id="portfolio-modal-6">
    <div class="portfolio-modal-dialog bg-white">
      <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
        <i class="fa fa-3x fa-times"></i>
      </a>
      <div class="container text-center">
       <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2 class="text-secondary text-uppercase mb-0">MÓDULO AUTO</h2>
            <hr class="star-dark mb-5">
            <img class="img-fluid mb-5" src="{{ asset('dist/img/portfolio/cabin.png') }}" alt="">
            <p class="mb-5">
                MÓDULO GRATUITO
            </p>
            <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
              <i class="fa fa-close"></i>
              CERRAR PROYECTO</a>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Plugin JavaScript -->
  <script src="{{ asset('dist/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('dist/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

  <!-- Contact Form JavaScript -->
  <script src="{{ asset('dist/js/jqBootstrapValidation.js') }}"></script>
  <script src="{{ asset('dist/js/contact_me.js') }}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{ asset('dist/js/freelancer.min.js') }}"></script>



  <script>
    
     function eliminar(argument) {
        var urlElimnar=$(argument).data('url');

        swal({
          title: "¿Estás seguro?",
          text: "Tu no podrás recuperar este información!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Si, borrar esto!",
          closeOnConfirm: false,
          cancelButtonText:"Cancelar"
        },
        function(){
          window.location.href = urlElimnar;
        });


    }

  </script>

</body>

</html>
