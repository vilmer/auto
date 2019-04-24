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
                    <button class="btn btn-link float-right" onclick="agregar(this);">Registrar vehículo</button>
                 <form id="" action="{{ route('ingresoOrden') }}" method="post">
                    @csrf
                    @if(count($autos)>0)
                      <div class="form-group">
                        <label for="vehiculo">Selecione vehículo</label>
                        <select class="selectpicker show-tick show-menu-arrow form-control" data-live-search="true" title="Selecione vehículo..." data-header="Selecione vehículo" required="" name="vehiculo" data-none-results-text="No hay resultados coincidentes {0}<button type='button' class='btn btn-link' data-toggle='modal' data-target='#MODALAUTO'>Registrar vehículo</button>">
                           @foreach($autos as $a)
                            <option value="{{ $a->id }}" data-subtext="{{ $a->color }}" {{ (old('vehiculo') == $a->id ? 'selected':'') }}>{{ $a->placa }} - <small>{{ $a->duenio }}</small></option>
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

                          <ul class="list-group list-group-horizontal">
                            @foreach($servicios as $ser)
                            <li class="list-group-item" style="background-image: url('{{ Storage::url('public/servicios/'.$ser->foto) }}'); background-position: center; background-repeat: no-repeat; background-size: cover;">

                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="servicios[]" id="inlineCheckbox{{$ser->id }}" value="{{ $ser->id }}" {{ (collect(old('servicios'))->contains($ser->id)) ? 'checked':'' }}>
                                <label class="form-check-label text-white bg-dark" for="inlineCheckbox{{$ser->id }}">
                                  {{ $ser->nombre }}
                                  <small>${{ $ser->precio }}</small>
                                </label>
                              </div>
                            </li>
                             @endforeach

                          </ul>

                    @else
                        <div class="alert alert-primary" role="alert">
                          No existe servicios, por favor ingrese uno.
                        </div>
                    @endif
                   

                    <div class="mt-1">
                      <a href="{{ route('home') }}" class="btn btn-danger float-right">Cancelar</a>
                    <button type="submit" class="btn btn-primary float-right">Generar nueva orden</button>
                    </div>

                  </form>



                </div>
            </div>
        </div>
    </div>
</div>



<!-- Button trigger modal -->



{{-- MODAL AUTO --}}
<div class="modal fade" id="MODALAUTO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelAu" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelAu">Nuevo Vehículo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
         <form action="{{ route('guardarAuto') }}" method="post">
            @csrf
            <input type="hidden" name="opcion" value="orden">

             <div class="form-group">
                        <label for="Propietario" class="">{{ __('PROPIETARIO') }}<span class="text-danger">*</span> </label>
                          <input id="Propietario" type="text" class="form-control{{ $errors->has('Propietario') ? ' is-invalid' : '' }}" name="Propietario" value="{{ old('Propietario') }}" required placeholder="Ingrese.." autofocus>

                          @if ($errors->has('Propietario'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('Propietario') }}</strong>
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
                            <label for="descripcion">AÑO<span class="text-danger">*</span></label>
                            
                            <input type="number" required="" name="descripcion" value="{{ old('descripcion') }}" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" id="descripcion" placeholder="Ingrese" >

                          
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

    function agregar(argument) {
      $('#MODALAUTO').modal('show');
    }
</script>

@if ($errors->any())
  <script>
    $('#MODALAUTO').modal('show');
  </script>
@endif



@endsection
