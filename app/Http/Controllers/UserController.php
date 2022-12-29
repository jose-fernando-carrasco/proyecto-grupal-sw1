<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function show(User $user){
        return view('users.show',compact('user'));
    }

    public function update(User $user, Request $request){
        $request->validate(['name' => 'required', 'email' => 'required', 'password' => 'required', 'password_new' => 'required']);
        if( password_verify($request->password,$user->password) ){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password_new);
            $user->update();
            return redirect()->route('users.show',$user)->with('info','ok');
        }
        return redirect()->route('users.show',$user)->with('info','error');
    }

    public function subirFoto(Request $request){
        $request->validate(['file' => 'required|image']);
        $user = User::find(auth()->user()->id);
        if($request->tipo == 'fondo'){
            $imagen = $request->file('file')->store('public/fondos');
            $imagen = Storage::url($imagen);
            $user->fondo = $imagen;
        }else{
            $imagen = $request->file('file')->store('public/perfiles');
            $imagen = Storage::url($imagen);
            $user->photo = $imagen;
        }
        $user->update();
        return redirect()->route('users.show',auth()->user());
    }

}
