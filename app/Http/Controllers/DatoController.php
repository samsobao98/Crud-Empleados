<?php

namespace App\Http\Controllers;

use App\Models\Dato;
use App\Models\Puesto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

/**
 * Class DatoController
 * @package App\Http\Controllers
 */
class DatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $datos = Dato::paginate();

        return view('dato.index', compact('datos'))
            ->with('i', ($request->input('page', 1) - 1) * $datos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $empleado = new Dato();
        $puestos = Puesto::all();

        return view('dato.create', compact('empleado', 'puestos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        Dato::create($request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:datos',
            'telefono' => 'required|string|max:15',
            'direccion' => 'nullable|string|max:255',
            'fecha_ingreso' => 'required|date',
            'puesto_id' => 'required|exists:puestos,id',
        ]));

        return Redirect()->route('datos.index')
            ->with('success', 'Empleado creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dato $dato): View
    {
        return view('dato.show', compact('dato'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $dato = Dato::find($id);
        $puestos = Puesto::all();

        return view('dato.edit', compact('dato', 'puestos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dato $dato): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:datos,email,' . $dato->id,
            'telefono' => 'required|string|max:15',
            'direccion' => 'nullable|string|max:255',
            'fecha_ingreso' => 'required|date',
            'puesto_id' => 'required|exists:puestos,id',
        ]);
        $dato->update($request->all());

        return Redirect::route('datos.index')
            ->with('success', 'Empleado actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dato $dato): RedirectResponse
    {
        $dato->delete();

        return Redirect::route('datos.index')
            ->with('success', 'Empleado eliminado correctamente.');
    }
}
