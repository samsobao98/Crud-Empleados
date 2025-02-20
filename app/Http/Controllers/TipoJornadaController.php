<?php

namespace App\Http\Controllers;

use App\Models\TipoJornada;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

/**
 * Class TipoJornadaController
 * @package App\Http\Controllers
 */
class TipoJornadaController extends Controller
{
    public function index(Request $request): View
    {
        $tipoJornadas = TipoJornada::paginate();

        return view('tipo_jornadas.index', compact('tipoJornadas'))
            ->with('i', ($request->input('page', 1) - 1) * $tipoJornadas->perPage());
    }

    public function create(): View
    {
        $tipoJornada = new TipoJornada();

        return view('tipo_jornadas.create', compact('tipoJornada'));
    }

    public function store(Request $request): RedirectResponse
    {
        TipoJornada::create($request->validate([
            'nombre' => 'required|string|max:50',
            'horas_semanales' => 'required|integer|min:1|max:168',
            'salario_base' => 'required|numeric|min:0',
        ]));

        return Redirect::route('tipo_jornadas.index')
            ->with('success', 'Tipo de jornada creada correctamente.');
    }

    public function show(TipoJornada $tipoJornada): View
    {
        return view('tipo_jornadas.show', compact('tipoJornada'));
    }

    public function edit(TipoJornada $tipoJornada): View
    {
        return view('tipo_jornadas.edit', compact('tipoJornada'));
    }

    public function update(Request $request, TipoJornada $tipoJornada): RedirectResponse
    {
        $tipoJornada->update($request->validate([
            'nombre' => 'required|string|max:50',
            'horas_semanales' => 'required|integer|min:1|max:168',
            'salario_base' => 'required|numeric|min:0',
        ]));

        return Redirect::route('tipo_jornadas.index')
            ->with('success', 'Tipo de jornada actualizada correctamente.');
    }

    public function destroy(TipoJornada $tipoJornada): RedirectResponse
    {
        $tipoJornada->delete();

        return Redirect::route('tipo_jornadas.index')
            ->with('success', 'Tipo de jornada eliminada correctamente.');
    }
}
