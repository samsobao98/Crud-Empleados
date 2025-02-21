@extends('layouts.app')

@section('template_title')
    Puestos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Puestos') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('puestos.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                    {{ __('Crear nuevo') }}
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
                                        <th>Descripción</th>
                                        <th>Tipo de Jornada</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 0; @endphp <!-- Inicializamos la variable $i para numerar los registros -->
                                    @foreach ($puestos as $puesto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $puesto->nombre }}</td>
                                            <td>{{ $puesto->descripcion }}</td>
                                            <td>{{ optional($puesto->tipoJornada)->nombre }}</td> <!-- Evita errores si la relación está vacía -->
                                            <td>
                                                <form action="{{ route('puestos.destroy', $puesto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('puestos.show', $puesto->id) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}
                                                    </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('puestos.edit', $puesto->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Estás seguro de eliminar este puesto?') ? this.closest('form').submit() : false;">
                                                        <i class="fa fa-fw fa-trash"></i> {{ __('Borrar') }}
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

                {!! $puestos->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
