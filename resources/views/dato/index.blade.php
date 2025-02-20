@extends('layouts.app')

@section('template_title')
    Datos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Datos de Empleados') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('datos.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Nº</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Email</th>
                                        <th>Teléfono</th>
                                        <th>Dirección</th>
                                        <th>Fecha de Ingreso</th>
                                        <th>Puesto</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 0; @endphp <!-- Inicializamos la variable $i para numerar los registros -->
                                    @foreach ($datos as $dato)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $dato->nombre }}</td>
                                            <td>{{ $dato->apellido }}</td>
                                            <td>{{ $dato->email }}</td>
                                            <td>{{ $dato->telefono }}</td>
                                            <td>{{ $dato->direccion }}</td>
                                            <td>{{ $dato->fecha_ingreso }}</td>
                                            <td>{{ optional($dato->puesto)->nombre }}</td> <!-- Evita errores si la relación está vacía -->
                                            <td>
                                                <form action="{{ route('datos.destroy', $dato->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('datos.show', $dato->id) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Show') }}
                                                    </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('datos.edit', $dato->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Estás seguro de eliminar este empleado?') ? this.closest('form').submit() : false;">
                                                        <i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {!! $datos->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
