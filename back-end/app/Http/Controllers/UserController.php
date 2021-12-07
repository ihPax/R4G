<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //REGISTRATION NEW USER
    public function register(request $request){

        $validator = Validator::make($request->all(),[
            'password' => 'required|string|min:6']);
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
}
