@extends('layouts.app')

@section('template_title')
    {{ $puesto->nombre ?? __('Show') . " " . __('Puesto') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Detalles del Puesto') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('puestos.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <div class="form-group">
                            <strong>Nombre del Puesto:</strong>
                            {{ $puesto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $puesto->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo de Jornada:</strong>
                            {{ optional($puesto->tipoJornada)->nombre }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
