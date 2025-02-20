<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use App\Models\TipoJornada;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

/**
 * Class PuestoController
 * @package App\Http\Controllers
 */
class PuestoController extends Controller
{
    public function index(Request $request): View
    {
        $puestos = Puesto::paginate();

        return view('puestos.index', compact('puestos'))
            ->with('i', ($request->input('page', 1) - 1) * $puestos->perPage());
    }

    public function create(): View
    {
        $puesto = new Puesto();
        $tipoJornadas = TipoJornada::all();

        return view('puestos.create', compact('puesto', 'tipoJornadas'));
    }

    public function store(Request $request): RedirectResponse
    {
        Puesto::create($request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'tipo_jornada_id' => 'required|exists:tipo_jornadas,id',
        ]));

        return Redirect::route('puestos.index')
            ->with('success', 'Puesto creado correctamente.');
    }

    public function show(Puesto $puesto): View
    {
        return view('puestos.show', compact('puesto'));
    }

    public function edit(Puesto $puesto): View
    {
        $tipoJornadas = TipoJornada::all();

        return view('puestos.edit', compact('puesto', 'tipoJornadas'));
    }

    public function update(Request $request, Puesto $puesto): RedirectResponse
    {
        $puesto->update($request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'tipo_jornada_id' => 'required|exists:tipo_jornadas,id',
        ]));

        return Redirect::route('puestos.index')
            ->with('success', 'Puesto actualizado correctamente.');
    }

    public function destroy(Puesto $puesto): RedirectResponse
    {
        $puesto->delete();

        return Redirect::route('puestos.index')
            ->with('success', 'Puesto eliminado correctamente.');
    }
}
