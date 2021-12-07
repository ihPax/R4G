<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    //REGISTRATION NEW USER
    public function register(request $request){
        $validator = Validator::make($request->all(),[
            'password' => 'required|string|min:6'
        ]);
        if ($validator->fails()) {
            return array("status" => 400, "message" => "Inserisci correttamente tutti la password");
        }

        $newUserData = json_decode($request->getContent());
        
        $newUser = new User();
        $newUser -> name = $newUserData->name;
        $newUser -> surname = $newUserData->surname;
        $newUser -> birthday =$newUserData->birthday;
        $newUser -> email = $newUserData->email;
        $newUser -> password = Hash::make($newUserData->password);
 
        $newUser -> save();
        return $newUser;
    }

    //LOGIN USER
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6'
        ]);
        if ($validator->fails()) {
            return array("status" => 500, "message" => "Inserisci correttamente l'email o la password");
        }
        $data = json_decode($request->getContent());

        $user = new User();
        $user->email = $data->email;
        $user->password = $data->password;
        $credentials = [
            'email' => $user->email,
            'password' => $user->password,
        ];

        if (Auth::attempt($credentials)) {
            return array("status" => 200, "message" => "login: TRUE");
        }else{
            return array("status" => 500, "message" => "login: FALSE", "error" => "Email o Password errati");
        }
    }

    //LOGOUT
    public function logout(){
        Auth::logout(); 
        return array("status" => 200, "message" => "Logout effettuato");
    }
}
