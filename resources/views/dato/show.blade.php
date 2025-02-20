@extends('layouts.app')

@section('template_title')
    {{ $dato->nombre ?? __('Show') . " " . __('Dato') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Detalles del Empleado') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('datos.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $dato->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido:</strong>
                            {{ $dato->apellido }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $dato->email }}
                        </div>
                        <div class="form-group">
                            <strong>Teléfono:</strong>
                            {{ $dato->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Dirección:</strong>
                            {{ $dato->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de Ingreso:</strong>
                            {{ $dato->fecha_ingreso }}
                        </div>
                        <div class="form-group">
                            <strong>Puesto:</strong>
                            {{ optional($dato->puesto)->nombre }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
