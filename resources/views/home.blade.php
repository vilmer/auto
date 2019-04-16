@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-transparent">
                    MÓDULOS DEL SISTEMA
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col">
                            <a href="{{ route('autos') }}">
                                <div class="jumbotron jumbotron-fluid">
                                  <div class="container">
                                    <h1 class="">AUTOS</h1>
                                  </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{ route('servicios') }}">
                                <div class="jumbotron jumbotron-fluid">
                                  <div class="container">
                                    <h2 class="">SERVICIOS</h2>
                                  </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{ route('ordenes') }}">
                                <div class="jumbotron jumbotron-fluid">
                                  <div class="container">
                                    <h1 class="">ORDENES</h1>
                                  </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{ route('historial') }}">
                                <div class="jumbotron jumbotron-fluid">
                                  <div class="container">
                                    <h1 class="">HISTORIAL</h1>
                                  </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $('#m_home').addClass('btn-success');
</script>
@endsection
