<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\User;
use App\Models\Mascota;
use Illuminate\Http\Request;
use App\Models\Alertamascota;
use App\Events\AlertamascotaEvent;
use App\Http\Requests\RazaRequest;
use App\Http\Requests\MascotaRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Support\Renderable;
use App\Notifications\AlertamascotaNotification;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(): Renderable {
        $mascotas = Mascota::with("razaMascota")->latest()->paginate();
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
        if ($request->hasFile('imagen')) {
            $image_path_imagen = $request->file('imagen')->store('mascotas', 'public');
            $validated['imagen'] = $image_path_imagen;
            
        }
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

    public function api_show($id) {
        $mascota = Mascota::with("razaMascota")->with('duenho')->find($id);

        return response()->json($mascota, 200);
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
        $validated = $request->safe()->only(['nombre','color','edad','pedigree','imagen','raza_id','duenho_id']);
        if ($request->hasFile('imagen')) {
            $image_path_imagen = $request->file('imagen')->store('mascotas', 'public');
            $validated['imagen'] = $image_path_imagen;
            
        }
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

    public function listarMascotas(){
        $mascotas = Mascota::select('id','nombre','imagen','color','pedigree')->get();
        $arrayMascotas  = array();
        foreach ($mascotas as $mascota) {
            if ($mascota->duenho_id) {
                $objMascota = new stdClass();
                $objMascota->nombre = $mascota->nombre  ;
                $objMascota->imagen = $mascota->imagen  ;
                $objMascota->pedigree = $mascota->pedigree  ;
                $objMascota->color =  $mascota->color  ;
                $objMascota->edad =  $mascota->edad  ;
                $objMascota->tipo =  'Perdido'  ;
            }else{
                $objMascota = new stdClass();
                $objMascota->nombre = $mascota->nombre  ;
                $objMascota->imagen = $mascota->imagen  ;
                $objMascota->pedigree = $mascota->pedigree  ;
                $objMascota->color =  $mascota->color  ;
                $objMascota->edad =  $mascota->edad  ;
                $objMascota->tipo =  'Encontrado'  ;
            }
            array_push($arrayMascotas,$objMascota);
        }
        return response()->json($arrayMascotas);
    }
}