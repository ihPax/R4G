<?php

namespace App\Http\Controllers;

use App\Models\Forgot_password;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Forgot_passwordController extends Controller
{
    //CREATE TOKEN AND SEND EMAIL
    public function submitForgetPasswordForm(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|exists:users'
        ]);
        if ($validator->fails()) {
            return array("status" => 500, "message" => "Inserisci correttamente l'email");
        }

        $data = json_decode($request->getContent());
        
        $code = Str::random(64);
        
        DB::table('forgot_passwords')->insert([
            'email' => $data->email, 
            'code' => $code, 
            'created_at' => Carbon::now()
        ]);

        Mail::send('email',['code' => $code], function($message) use($data){
            $message->from('r4g.recycleteam@gmail.com');
            $message->to($data->email);
            $message->subject('R4G - Reset Password');
        });
        
        return $code;
    }

    //RESET PASSWORD
    public function submitResetPasswordForm(Request $request, $code)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6'
        ]);
        if ($validator->fails()) {
            return array("status" => 500, "message" => "Inserisci correttamente tutti i campi");
        }

        $data = json_decode($request->getContent());
        $codePassword = Forgot_password::find($code);

        $codePassword = DB::table('forgot_passwords')->where([
            'email' => $data->email
        ])->first();

        if(!$codePassword){
            return array("status" => 500, "message" => "Token non valido");
        }

        User::where('email', $data->email)->update(['password' => Hash::make($data->password)]);

        DB::table('forgot_passwords')->where(['email'=> $data->email])->delete();

        return array("status" => 200, "message" => "La password è stata cambiata");
    }
}
