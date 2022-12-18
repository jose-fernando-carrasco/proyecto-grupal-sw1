<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request){

        $validator = Validator::make($request->all(), ['email' => 'required|email','password' => 'required']);
        if ( $validator->fails() ){
            return response()->json(['success' => false, 'msg' => 'Campos incorrectos', 'errors' => $validator->errors()], 400);
        }
        $user = User::where( 'email', '=', $request->email )->first();
        if ( isset( $user) ){
            if ( Hash::check( $request->password, $user->password ) ){
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()->json(['success' => true,'msg' => 'Usuario logueado exitosamente','acces_token' => $token,'errors' => []], 200);
            }else{
                return response()->json(['success' => false,'msg' => 'Credenciales incorrectas'], 400);
            }
        }else{
            return response()->json(['success' => false,'msg' => 'Usuario no registrado'], 400);
        }
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(), ['name' => 'required','email' => 'required|email|unique:users,email','password' => 'required|min:3']);
        if ( $validator->fails() ){
            return response()->json(['success' => false,'msg' => 'Campos incorrectos','errors' => $validator->errors()], 400);
        }
        $request->merge(['password'=> Hash::make($request->password)]);
        $user = User::create($request->all());
        $user->fondo = 'img/fondoPerfil.jpg';
        $user->photo = 'img/Usuario.jpg';
        $user->update();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['success' => true,'msg' => 'Registro de usuario exitoso','acces_token' => $token,'errors' => []], 200);
     }

}
