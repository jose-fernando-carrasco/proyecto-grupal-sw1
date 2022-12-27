<?php

namespace App\Http\Controllers;

use App\Models\Raza;
use Illuminate\Http\Request;
use App\Http\Requests\RazaRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Support\Renderable;

class RazaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(): Renderable {
        $razas = Raza::latest()->paginate();
        return view("razas.index", compact("razas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(): Renderable {
        $raza = new Raza;
        $title = __("Crear razas");
        $action = route("razas.store");
        return view("razas.form", compact("raza", "title", "action"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RazaRequest $request
     * @return RedirectResponse
     */
    public function store(RazaRequest $request) {
        $validated = $request->safe()->only(['nombre']);
        Raza::create($validated);

        session()->flash("success", __("La raza ha sido creado correctamente"));
        return redirect(route("razas.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param Raza $Raza
     * @return Renderable
     */
    public function show(Raza $raza): Renderable {
        return view("razas.show", compact("raza"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Raza $Raza
     * @return Renderable
     */
    public function edit(Raza $raza): Renderable {
        $title = __("Actualizar raza");
        $action = route("razas.update", ["raza" => $raza]);
        return view("razas.form", compact("raza", "title", "action"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RazaRequest $request
     * @param Raza $Raza
     * @return RedirectResponse
     */
    public function update(RazaRequest $request, Raza $raza) {
        $validated = $request->safe()->only(['nombre']);
        $raza->update($validated);

        session()->flash("success", __("La raza ha sido actualizado correctamente"));
        return redirect(route("razas.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Raza $Raza
     * @return RedirectResponse
     */
    public function destroy(Raza $raza) {
        $raza->delete();
        session()->flash("success", __("El raza ha sido eliminado correctamente"));
        return redirect(route("razas.index"));
    }
}
