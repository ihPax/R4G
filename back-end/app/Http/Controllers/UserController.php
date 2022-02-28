<?php

namespace App\Http\Controllers;

use App\Models\BinUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //REGISTRATION NEW USER
    public function register(request $request){
        $validator = Validator::make($request->all(),[
            'password' => 'required|string|min:6'
        ]);
        if ($validator->fails()) {
            return array("status" => 400, "message" => "Inserisci correttamente la password");
        }

        $newUserData = json_decode($request->getContent());
        
        $newUser = new User();
        $newUser->name = $newUserData->name;
        $newUser->surname = $newUserData->surname;
        $newUser->birthday =$newUserData->birthday;
        $newUser->email = $newUserData->email;
        $newUser->password = Hash::make($newUserData->password);
 
        $newUser -> save();
        return $newUser;
    }

    //LOGIN USER
    public function login(Request $request){
        $this->validate($request,[
            'email' => 'bail|required|email',
            'password' => 'bail|required|min:6'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user();
            return response()->json([
              'status' => 'success',
              'user' => $user,
            ]
            ,200); 
        }else{ 
            return response()->json([
              'status' => 'error',
              'user' => 'Unauthorized Access'
            ]
            ,401); 
        }
    }

    //CURRENT-USER
    public function currentUser($email){
       return User::where("email", $email)->first();
    }

    //LOGOUT
    public function logout(){
        Auth::logout(); 
        return array("status" => 200, "message" => "Logout effettuato");
    }

    //SAVE USER-ZONE
    public function saveZone($email, Request $request){
        $data = json_decode($request->getContent());

        $userZone = User::where("email", $email)->first();
        $userZone->zone_id = $data->zone_id;

        $userZone->save();
        return array("status" => 200, "message" => "Zona inserita");
    }

    //UPDATE USER
    public function updateUser(Request $request, $id){
        $this->validate($request,[
            'password' => 'bail|required|min:6'
        ]);
        
        $data = json_decode($request->getContent());
        $user = User::find($id);

        $user->name = $data->name;
        $user->surname = $data->surname;
        $user->birthday = $data->birthday;
        $user->password = Hash::make($data->password);
        $user->zone_id = $data->zone_id;

        $user -> save();
        return $user;
    }

    //UPDATE USER WITHOUT PASSWORD
    public function updateUserWithoutPassword(Request $request, $id){
        $data = json_decode($request->getContent());
        $user = User::find($id);

        $user->name = $data->name;
        $user->surname = $data->surname;
        $user->birthday = $data->birthday;
        $user->zone_id = $data->zone_id;

        $user -> save();
        return $user;
    }
}
