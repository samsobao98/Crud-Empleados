@extends('layouts.app')

@section('template_title')
    {{ __('Crear Tipo de Jornada') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear Nuevo Tipo de Jornada') }}</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('tipo_jornadas.store') }}" role="form">
                            @csrf

                            <div class="form-group">
                                <label for="nombre">Nombre del Tipo de Jornada</label>
                                <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="horas_semanales">Horas Semanales</label>
                                <input type="number" name="horas_semanales" class="form-control" value="{{ old('horas_semanales') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="salario_base">Salario Base</label>
                                <input type="number" step="0.01" name="salario_base" class="form-control" value="{{ old('salario_base') }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('tipo_jornadas.index') }}" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
