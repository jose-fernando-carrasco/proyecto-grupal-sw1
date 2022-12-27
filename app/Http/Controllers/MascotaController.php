<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;
use App\Models\Alertamascota;
use App\Http\Requests\RazaRequest;
use App\Http\Requests\MascotaRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Support\Renderable;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(): Renderable {
        $mascotas = Mascota::with("raza")->latest()->paginate();
        return view("mascotas.index", compact("mascotas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(): Renderable {
        $mascota = new Mascota;
        $title = __("Crear mascotas");
        $action = route("mascotas.store");
        return view("mascotas.form", compact("mascota", "title", "action"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RazaRequest $request
     * @return RedirectResponse
     */
    public function store(MascotaRequest $request) {
        $validated = $request->safe()->only(['nombre','color','edad','pedigree','imagen','raza_id','duenho_id']);
        $image_path = $request->file('pedigree')->store('pedigree');
        $image_path_imagen = $request->file('imagen')->store('mascotas');
        $validated['pedigree'] = $image_path;
        $validated['imagen'] = $image_path_imagen;
        Mascota::create($validated);

        session()->flash("success", __("La mascota ha sido creado correctamente"));
        return redirect(route("mascotas.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param Raza $Raza
     * @return Renderable
     */
    public function show(Mascota $mascota): Renderable {
        return view("mascotas.show", compact("mascota"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Raza $Raza
     * @return Renderable
     */
    public function edit(Mascota $mascota): Renderable {
        $title = __("Actualizar mascota");
        $action = route("mascotas.update", ["mascota" => $mascota]);
        return view("mascotas.form", compact("mascota", "title", "action"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RazaRequest $request
     * @param Raza $Raza
     * @return RedirectResponse
     */
    public function update(MascotaRequest $request, Mascota $mascota) {
        $validated = $request->safe()->only(['nombre']);
        $mascota->update($validated);

        session()->flash("success", __("La mascota ha sido actualizado correctamente"));
        return redirect(route("mascotas.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Raza $Raza
     * @return RedirectResponse
     */
    public function destroy(Mascota $mascota) {
        $mascota->delete();
        session()->flash("success", __("La mascota ha sido eliminado correctamente"));
        return redirect(route("mascotas.index"));
    }

    public function createAlerta(){
        $mascotas = Mascota::where('duenho_id',auth()->user()->id)->get();
        return view('mascotas.createalerta',compact('mascotas'));
    }

    public function alertaStore(Request $request){
        $alerta = Alertamascota::create(['latitud' => $request->latitud,'longitud' => $request->longitud,'detalle' => $request->detalle,'mascota_id' => $request->mascota_id]);
        broadcast(new AlertamascotaEvent($alerta))->toOthers();
        return 'Creado con Exito';
    }
    
    public function notifications(){
        $cantidad = auth()->user()->unreadNotifications->count();
        $contenido = auth()->user()->notifications;
        // return $contenido->created_at->format('Y-m-d');
        if($cantidad == 0)
            return ["",$contenido];
        return [$cantidad,$contenido];
    }

}