<?php

namespace App\Http\Controllers;

use App\Models\BinUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //REGISTRATION NEW USER
    public function register(request $request){
        $validator = Validator::make($request->all(),[
            'name'     => 'bail|required|string|min:2',
            'surname'  => 'bail|required|string|min:2',
            'birthday' => 'bail|required|date',
            'email'    => 'bail|required|email|unique:users,email',
            'password' => 'bail|required|string|min:6'
        ]);

        Log::info("Funziona");
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
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
        $validator = Validator::make($request->all(), [
            'email'    => 'bail|required|email',
            'password' => 'bail|required|string|min:6'
        ]);

        Log::info($validator->fails());
        //Per vederli in console: tail -f storage/logs/laravel.log

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $this->validate($request,[
            'email'    => 'bail|required|email',
            'password' => 'bail|required|min:6'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user();
            return response()->json([
              'status' => 'success',
              'user'   => $user,
            ]
            ,200); 
        }else{ 
            return response()->json([
              'status' => 'error',
              'user'   => 'Unauthorized Access'
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
        $validator = Validator::make($request->all(),[
            'name'     => 'bail|required|string|min:2',
            'surname'  => 'bail|required|string|min:2',
            'birthday' => 'bail|required|date',
            'email'    => 'bail|required|email',
            'password' => 'bail|nullable|string|min:6',
            'zone_id'  => 'bail|nullable|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        
        $data = json_decode($request->getContent());
        $user = User::find($id);

        //verifico se la email nella richiesta è uguale a quella associata all'ID nel database
        if ($data->email === $user->email) {
            $user->name = $data->name;
            $user->surname = $data->surname;
            $user->birthday = $data->birthday;
            if ($data->password != "") {
                $user->password = Hash::make($data->password);
            }
            if ($data->zone_id != "") {
                $user->zone_id = $data->zone_id;
            }
            $user -> save();
            return $user;
        } else { 
            return response()->json([
              'user'   => 'Unauthorized operation'
            ]
            , 401); 
        }
    }
}
