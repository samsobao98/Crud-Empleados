@extends('layouts.app')

@section('template_title')
    {{ __('Actualizar Empleado') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar Información del Empleado') }}</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('datos.update', $dato->id) }}" role="form" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $dato->nombre) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" name="apellido" class="form-control" value="{{ old('apellido', $dato->apellido) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $dato->email) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $dato->telefono) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" name="direccion" class="form-control" value="{{ old('direccion', $dato->direccion) }}">
                            </div>

                            <div class="form-group">
                                <label for="fecha_ingreso">Fecha de Ingreso</label>
                                <input type="date" name="fecha_ingreso" class="form-control" value="{{ old('fecha_ingreso', $dato->fecha_ingreso) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="puesto_id">Puesto</label>
                                <select name="puesto_id" class="form-control" required>
                                    <option value="">Seleccione un puesto</option>
                                    @foreach($puestos as $puesto)
                                        <option value="{{ $puesto->id }}" {{ old('puesto_id', $dato->puesto_id) == $puesto->id ? 'selected' : '' }}>
                                            {{ $puesto->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            <a href="{{ route('datos.index') }}" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
