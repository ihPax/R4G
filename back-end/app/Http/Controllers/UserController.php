<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function register(request $request){
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
