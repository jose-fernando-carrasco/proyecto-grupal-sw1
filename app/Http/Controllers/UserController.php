<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function show(User $user){
        return view('users.show',compact('user'));
    }

    public function update(Request $request){
        $request->validate(['name' => 'required', 'email' => 'required', 'password' => 'required', 'password_new' => 'required']);
        $user = User::find($request->user_id);
        if( password_verify($request->password,$user->password) ){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password_new);
            $user->update();
            return redirect()->route('users.show',$user)->with('info','ok');
        }
        return redirect()->route('users.show',$user)->with('info','error');
    }

}
