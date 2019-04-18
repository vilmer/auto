@extends('layouts.app')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-transparent">
                    NUEVA ORDEN
                </div>

                <div class="card-body">
                    
                 <form id="" action="{{ route('ingresoOrden') }}" method="post">
                    @csrf
                    @if(count($autos)>0)
                      <div class="form-group">
                        <label for="vehiculo">Selecione vehículo</label>
                        <select class="selectpicker show-tick show-menu-arrow form-control" data-live-search="true" title="Selecione vehículo..." data-header="Selecione vehículo" required="" name="vehiculo" data-none-results-text="No hay resultados coincidentes {0}<button type='button' class='btn btn-link' data-toggle='modal' data-target='#MODALAUTO'>Registrar vehículo</button>">
                           @foreach($autos as $a)
                            <option value="{{ $a->id }}" data-subtext="{{ $a->color }}" {{ (old('vehiculo') == $a->id ? 'selected':'') }}>{{ $a->placa }}</option>
                           @endforeach
                          </select>
                      </div>
                      @else
                          <div class="alert alert-primary" role="alert">
                            No existe autos, por favor ingrese uno.
                          </div>
                      @endif

                       <label for="servicios">Catálogo de mantenimientos</label>
                      <br>
                     @if(count($servicios)>0)

                             
                             @foreach($servicios as $ser)
                             <div class="form-check form-check-inline">

                              <input class="form-check-input" type="checkbox" name="servicios[]" id="inlineCheckbox{{$ser->id }}" value="{{ $ser->id }}" {{ (collect(old('servicios'))->contains($ser->id)) ? 'checked':'' }}>
                              <label class="form-check-label" for="inlineCheckbox{{$ser->id }}">{{ $ser->nombre }}</label>
                            </div>
                             @endforeach

                    @else
                        <div class="alert alert-primary" role="alert">
                          No existe servicios, por favor ingrese uno.
                        </div>
                    @endif
                   


                    <button type="submit" class="btn btn-primary float-right">Generar nueva orden</button>
                  </form>



                </div>
            </div>
        </div>
    </div>
</div>



<!-- Button trigger modal -->


<!-- Modal EMPLEADO-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo encargado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form method="POST" action="{{ route('registroEmpleado') }}">
            @csrf

           

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

{{-- MODAL AUTO --}}
<div class="modal fade" id="MODALAUTO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelAu" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelAu">Nuevo auto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
         <form action="{{ route('guardarAuto') }}" method="post">
            @csrf
            <input type="hidden" name="opcion" value="orden">

             <div class="form-group">
                <label for="duenio" class="">{{ __('DUEÑO') }}<span class="text-danger">*</span> </label>
                  <input id="duenio" type="text" class="form-control{{ $errors->has('duenio') ? ' is-invalid' : '' }}" name="duenio" value="{{ old('duenio') }}" required placeholder="Ingrese.." autofocus>

                  @if ($errors->has('duenio'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('duenio') }}</strong>
                      </span>
                  @endif
            </div>

              <div class="form-group">
                <label for="placa">PLACA<span class="text-danger">*</span></label>
                <input type="text" class="form-control{{ $errors->has('placa') ? ' is-invalid' : '' }}" id="placa" aria-describedby="nombreHelp" placeholder="Ingrese.." value="{{ old('placa') }}" name="placa" required="">
                <small id="nombreHelp" class="form-text text-muted">Ej, XBA-001</small>
                @if ($errors->has('placa'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('placa') }}</strong>
                    </span>
                @endif
              </div>

              <div class="form-group">
                <label for="color">COLOR<span class="text-danger">*</span></label>
                <input type="text" class="form-control{{ $errors->has('color') ? ' is-invalid' : '' }}" id="color" aria-describedby="nombreHelp" placeholder="Ingrese.." value="{{ old('color') }}" name="color" required="">
                <small id="nombreHelp" class="form-text text-muted">Ej, Rojo</small>
                @if ($errors->has('color'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('color') }}</strong>
                    </span>
                @endif
              </div>
                

                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" id="descripcion" rows="3" placeholder="Ingrese todos los detalles del auto..." name="descripcion">{{ old('descripcion') }}</textarea>

                  
                    @if ($errors->has('descripcion'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('descripcion') }}</strong>
                        </span>
                    @endif
                </div>

              <button type="submit" class="btn btn-primary">GUARDAR</button>
            </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

{{-- MODAL SERVICIO --}}

<div class="modal fade" id="MODALSERVICIO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelServ" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelServ">Nuevo servico</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('guardarServicio') }}" method="post">
            @csrf
            <input type="hidden" name="opcion" value="orden">
              <div class="form-group">
                <label for="nombre">Servicio<span class="text-danger">*</span></label>
                <input type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" id="nombre" aria-describedby="nombreHelp" placeholder="Ingrese.." value="{{ old('nombre') }}" name="nombre" autofocus="" required="">
                <small id="nombreHelp" class="form-text text-muted">Ej, Cambio de llantas</small>
                @if ($errors->has('nombre'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nombre') }}</strong>
                    </span>
                @endif
              </div>

              <div class="form-group">
                <label for="precio">Precio<span class="text-danger">*</span></label>
                <input type="text" class="form-control{{ $errors->has('precio') ? ' is-invalid' : '' }}" id="precio" aria-describedby="nombreHelp" placeholder="Ingrese.." value="{{ old('precio') }}" name="precio" required="">
                <small id="nombreHelp" class="form-text text-muted">Ej, 10.00</small>
                @if ($errors->has('precio'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('precio') }}</strong>
                    </span>
                @endif
              </div>
                

                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" id="descripcion" rows="3" placeholder="Ingrese.." name="descripcion">{{ old('descripcion') }}</textarea>
                    @if ($errors->has('descripcion'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('descripcion') }}</strong>
                        </span>
                    @endif
                </div>

              <button type="submit" class="btn btn-primary">GUARDAR</button>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<script>
    $('#m_odernes').addClass('btn-success');
</script>
@endsection
