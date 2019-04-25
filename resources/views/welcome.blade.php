@extends('layouts.app')

@section('content')
  <!-- Header -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container">
      <img class="img-fluid mb-5 d-block mx-auto img-thumbnail" width="150px;" src="{{ asset('dist/img/car-lift.svg') }}" alt="">
      <h2 class="text-uppercase mb-0">SISTEMA DE MANTENIMIENTO VEHICULAR</h2>
      <hr class="star-light">
      <h2 class="font-weight-light mb-0">
          Sistema web - Sistema multiplataforma - Diseño de experiencia de usuario
      </h2>
    </div>
  </header>

  <!-- Portfolio Grid Section -->
  <section class="portfolio" id="portfolio">
    <div class="container">
      <h2 class="text-center text-uppercase text-secondary mb-0">Módulos</h2>
      <hr class="star-dark mb-5">
      <div class="row">
        <div class="col-md-6 col-lg-4">
          <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-1">

            <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
              <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                <i class="fas fa-search-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="{{ asset('dist/img/portfolio/cabin.png') }}" alt="">
            AUTOS
          </a>
        </div>
        <div class="col-md-6 col-lg-4">
          <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-2">
            <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
              <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                <i class="fas fa-search-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="{{ asset('dist/img/portfolio/cake.png') }}" alt="">
            SERVICIOS
          </a>
        </div>
        <div class="col-md-6 col-lg-4">
          <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-3">
            <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
              <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                <i class="fas fa-search-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="{{ asset('dist/img/portfolio/circus.png') }}" alt="">
            ORDÉN DE TRABAJO
          </a>
        </div>
        <div class="col-md-6 col-lg-4">
          <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-4">
            <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
              <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                <i class="fas fa-search-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="{{ asset('dist/img/portfolio/game.png') }}" alt="">
            HISTORIAL VEHICULAR
          </a>
        </div>
        <div class="col-md-6 col-lg-4">
          <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-5">
            <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
              <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                <i class="fas fa-search-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="{{ asset('dist/img/portfolio/safe.png') }}" alt="">
            REPORTES
          </a>
        </div>
        <div class="col-md-6 col-lg-4">
          <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-6">
            <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
              <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                <i class="fas fa-search-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="{{ asset('dist/img/portfolio/submarine.png') }}" alt="">
            IMPRESIONES
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section class="bg-primary text-white mb-0" id="about">
    <div class="container">
      <h2 class="text-center text-uppercase text-white">ACERCA DEL SISTEMA</h2>
      <hr class="star-light mb-5">
      <div class="row">
        <div class="col-lg-4 ml-auto">
          <p class="lead">
              SISTEMA WEB, ACCESIBLE Y DISPONIBLE 24/7 DE CUALQUIER PARTE DEL MUNDO
          </p>
        </div>
        <div class="col-lg-4 mr-auto">
          <p class="lead">
              SISTEMA DISPONIBLE Y ADAPTABLE DESDE CUALQUIER DISPOSITIVO CON ACCESO A INTERNET
          </p>
        </div>
      </div>
      <div class="text-center mt-4">
        <a class="btn btn-xl btn-outline-light" href="{{ route('login') }}">
          <i class="fas fa-sign-in-alt"></i>
          INGRESAR
        </a>
      </div>
    </div>
  </section>
<link href="//vjs.zencdn.net/7.3.0/video-js.min.css" rel="stylesheet">
<script src="//vjs.zencdn.net/7.3.0/video.min.js"></script>

  <!-- Contact Section -->
  <section id="contact">
    <div class="container">
      <h2 class="text-center text-uppercase text-secondary mb-0">Iniciar mirando nuestro video</h2>
      <hr class="star-dark mb-5">
      <div class="row">
        <div class="embed-responsive embed-responsive-16by9">
          
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/bFlp6x28Z6k" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        </div>
      </div>
    </div>
  </section>
@endsection
