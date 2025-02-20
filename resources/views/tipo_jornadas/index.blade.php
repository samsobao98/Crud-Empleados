@extends('layouts.app')

@section('template_title')
    Tipo Jornadas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Tipo Jornadas') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('tipo_jornadas.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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
                                        <th>Horas Semanales</th>
                                        <th>Salario Base</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 0; @endphp <!-- Inicializamos la variable $i para numerar los registros -->
                                    @foreach ($tipoJornadas as $tipoJornada)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $tipoJornada->nombre }}</td>
                                            <td>{{ $tipoJornada->horas_semanales }}</td>
                                            <td>{{ $tipoJornada->salario_base }}</td>
                                            <td>
                                                <form action="{{ route('tipo_jornadas.destroy', $tipoJornada->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('tipo_jornadas.show', $tipoJornada->id) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Show') }}
                                                    </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tipo_jornadas.edit', $tipoJornada->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Estás seguro de eliminar este tipo de jornada?') ? this.closest('form').submit() : false;">
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

                {!! $tipoJornadas->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
