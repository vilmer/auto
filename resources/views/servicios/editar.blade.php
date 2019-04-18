@extends('layouts.app')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-transparent">
                    ACTUALIZAR  SERVICIO
                </div>

                <div class="card-body">
                   <form action="{{ route('actualizarServicio') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $ser->id }}" required="">
                      <div class="form-group">
                        <label for="nombre">Servicio<span class="text-danger">*</span></label>
                        <input type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" id="nombre" aria-describedby="nombreHelp" placeholder="Ingrese.." value="{{ $ser->nombre }}" name="nombre" autofocus="" required="">
                        <small id="nombreHelp" class="form-text text-muted">Ej, Cambio de llantas</small>
                        @if ($errors->has('nombre'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="precio">Precio<span class="text-danger">*</span></label>
                        <input type="text" class="form-control{{ $errors->has('precio') ? ' is-invalid' : '' }}" id="precio" aria-describedby="nombreHelp" placeholder="Ingrese.." value="{{ $ser->precio }}" name="precio" required="">
                        <small id="nombreHelp" class="form-text text-muted">Ej, 10.00</small>
                        @if ($errors->has('precio'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('precio') }}</strong>
                            </span>
                        @endif
                      </div>
                        

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" id="descripcion" rows="3" placeholder="Ingrese.." name="descripcion">{{ $ser->descripcion }}</textarea>

                           
                            @if ($errors->has('descripcion'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                </span>
                            @endif
                        </div>

                      <button type="submit" class="btn btn-primary">GUARDAR</button>
                      <a href="{{ route('servicios') }}" class="btn btn-danger">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    
    </div>
</div>


<script>
    $('#m_servicios').addClass('btn-success');
</script>
@endsection
