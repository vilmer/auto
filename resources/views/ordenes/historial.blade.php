@extends('layouts.app')

@section('content')

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-transparent">
                    LISTADO DE ORDENES
                </div>

                <div class="card-body">
                   {!! $dataTable->table()  !!}
                </div>
            </div>
        </div>
     
    </div>
</div>

{!! $dataTable->scripts() !!}

<script>
    $('#m_historial').addClass('btn-success');
</script>
@endsection
