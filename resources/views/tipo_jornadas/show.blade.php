@extends('layouts.app')

@section('template_title')
    {{ $tipoJornada->nombre ?? __('Show') . " " . __('Tipo de Jornada') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Detalles del Tipo de Jornada') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('tipo_jornadas.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $tipoJornada->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Horas Semanales:</strong>
                            {{ $tipoJornada->horas_semanales }}
                        </div>
                        <div class="form-group">
                            <strong>Salario Base:</strong>
                            {{ $tipoJornada->salario_base }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
