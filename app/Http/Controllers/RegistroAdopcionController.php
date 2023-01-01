<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\Registro_Adopcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class RegistroAdopcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adopcion = false;
        $adoptado = true;
        $adopciones = Registro_Adopcion::where('estado', '=', $adopcion)
                        ->with('mascota')
                        ->get();
                        // ->select('id', 'mascota_id','mascota.nombre as nombre')
        //get mascotas
        dd($adopciones);
        return view('adopciones.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mascotas = Mascota::all();
        return view('adopciones.create', compact('mascotas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duenho_id =  Mascota::find($request->mascota_id)->duenho_id;
        Registro_Adopcion::create(
            [
                'fecha' => Date::now(),
                'descripcion' => $request->description,
                'domicilio' => $request->direction,
                'longitudDom' => $request->longitud,
                'latitudDom' => $request->latitud,
                'duenho_id' => $duenho_id,
                'mascota_id' => $request->mascota_id,
            ]
        );

        //response ok
        return response()->json(['success' => 'Registro de adopcion creado correctamente'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registro_Adopcion  $registro_Adopcion
     * @return \Illuminate\Http\Response
     */
    public function show(Registro_Adopcion $registro_Adopcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registro_Adopcion  $registro_Adopcion
     * @return \Illuminate\Http\Response
     */
    public function edit(Registro_Adopcion $registro_Adopcion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registro_Adopcion  $registro_Adopcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registro_Adopcion $registro_Adopcion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registro_Adopcion  $registro_Adopcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registro_Adopcion $registro_Adopcion)
    {
        //
    }
}
