@extends('layouts.app')

@section('template_title')
    {{ __('Actualizar Puesto') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar Información del Puesto') }}</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('puestos.update', $puesto->id) }}" role="form" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="nombre">Nombre del Puesto</label>
                                <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $puesto->nombre) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea name="descripcion" class="form-control">{{ old('descripcion', $puesto->descripcion) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="tipo_jornada_id">Tipo de Jornada</label>
                                <select name="tipo_jornada_id" class="form-control" required>
                                    <option value="">Seleccione un tipo de jornada</option>
                                    @foreach($tipoJornadas as $tipoJornada)
                                        <option value="{{ $tipoJornada->id }}" {{ old('tipo_jornada_id', $puesto->tipo_jornada_id) == $tipoJornada->id ? 'selected' : '' }}>
                                            {{ $tipoJornada->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            <a href="{{ route('puestos.index') }}" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
