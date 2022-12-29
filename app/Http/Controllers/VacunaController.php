<?php

namespace App\Http\Controllers;

use App\Models\Vacuna;
use App\Models\Mascota;
use Illuminate\Http\Request;
use App\Http\Requests\VacunaRequest;
use Illuminate\Contracts\Support\Renderable;

class VacunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Mascota $mascota): Renderable {
        $vacunas = Vacuna::latest()->paginate();
        return view("vacunas.index", compact("vacunas","mascota"));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(Mascota $mascota): Renderable {
        $vacunas = new Vacuna;
        $title = __("Crear vacunas");
        $action = route("vacunas.store",$mascota);
        return view("vacunas.form", compact("vacunas", "mascota", "title", "action"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RazaRequest $request
     * @return RedirectResponse
     */
    public function store(VacunaRequest $request) {
        $validated = $request->safe()->only(['tipo_vacuna','detalle','mascota_id']);
        Vacuna::create($validated);

        session()->flash("success", __("La vacuna ha sido creado correctamente"));
        return redirect(route("vacunas.index",Mascota::findOrFail($request->mascota_id)));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacuna  $vacuna
     * @return \Illuminate\Http\Response
     */
    public function show(Vacuna $vacuna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacuna  $vacuna
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacuna $vacuna)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacuna  $vacuna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacuna $vacuna)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Raza $Raza
     * @return RedirectResponse
     */
    public function destroy(Vacuna $vacuna) {
        $vacuna->delete();
        session()->flash("success", __("La vacuna ha sido eliminado correctamente"));
        return redirect(route("vacunas.index",Mascota::findOrFail($vacuna->mascota_id)));
    }
}
