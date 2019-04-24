@extends('layouts.app')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-transparent">
                    ACTUALIZAR  VEHÍCULO
                </div>

                <div class="card-body">
                  <form action="{{ route('actualizarAuto') }}" method="post">
                    <input type="hidden" name="id" value="{{ $auto->id }}" required="">
                    @csrf
                      <div class="form-group">
                        <label for="Propietario" class="">{{ __('PROPIETARIO') }}<span class="text-danger">*</span> </label>
                          <input id="Propietario" type="text" class="form-control{{ $errors->has('Propietario') ? ' is-invalid' : '' }}" name="Propietario" value="{{ $auto->duenio }}" required placeholder="Ingrese.." autofocus>

                          @if ($errors->has('Propietario'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('Propietario') }}</strong>
                              </span>
                          @endif
                    </div>

                      <div class="form-group">
                        <label for="placa">PLACA<span class="text-danger">*</span></label>
                        <input type="text" class="form-control{{ $errors->has('placa') ? ' is-invalid' : '' }}" id="placa" aria-describedby="nombreHelp" placeholder="Ingrese.." value="{{ $auto->placa }}" name="placa" required="">
                        <small id="nombreHelp" class="form-text text-muted">Ej, XBA-001</small>
                        @if ($errors->has('placa'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('placa') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div class="form-group">
                        <label for="color">COLOR<span class="text-danger">*</span></label>
                        <input type="text" class="form-control{{ $errors->has('color') ? ' is-invalid' : '' }}" id="color" aria-describedby="nombreHelp" placeholder="Ingrese.." value="{{ $auto->color }}" name="color" required="">
                        <small id="nombreHelp" class="form-text text-muted">Ej, Rojo</small>
                        @if ($errors->has('color'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('color') }}</strong>
                            </span>
                        @endif
                      </div>
                        

                        <div class="form-group">
                            <label for="descripcion">AÑO<span class="text-danger">*</span></label>
                            
                            <input type="number" required="" name="descripcion" value="{{ $auto->descripcion }}" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" id="descripcion" placeholder="Ingrese" >

                          
                            @if ($errors->has('descripcion'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                </span>
                            @endif
                        </div>

                      <button type="submit" class="btn btn-primary">GUARDAR</button>
                      <a href="{{ route('autos') }}" class="btn btn-danger">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    
    </div>
</div>


<script>
    $('#m_autos').addClass('btn-success');
</script>
@endsection
