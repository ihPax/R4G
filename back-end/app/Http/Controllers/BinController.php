<?php

namespace App\Http\Controllers;

use App\Models\Bin;
use App\Models\Calendar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BinController extends Controller
{
    //NEW BIN
    public function saveBin($user_id, Request $request){
        $data = json_decode($request->getContent());

        $newBin = new Bin();
        $newBin->user_id = $user_id;
        $newBin->name = $data->name;

        $newBin->save();
        return array("status" => 200, "bin" => $newBin, "message" => "Cestino inserito");
    }

    //UPDATE BIN
    public function updateBin($id, Request $request){
        $data = json_decode($request->getContent());

        $bin = Bin::where("id",$id)->first();
        $bin->name = $data->name;

        $bin->save();
        return array("status" => 200, "message" => "Cestino modificato");
    }

    //VIEW ALL
    public function viewMateriale($id){
        $bin = Bin::with(["zones"])->where("id",$id)->get();
        return $bin;
    }

    //VIEW BIN WITH MATERIAL
    public function materialBin($id){
        $bin = Bin::where("id",$id)->first();
        $name_material = $bin->name;
        
        $user = User::where("id",$bin->user_id)->first(); 
        $id_zone = $user->zone_id;

        $calendar = Calendar::where("zone_id",$id_zone)->get();

        $list = [];
        array_push($list, $bin);

        foreach($calendar as $cal){
            if($name_material == $cal->material){
                array_push($list, $cal);
            }
        }
        
        return $list;
    }

    //GET BIN
    public function getBin($user_id){
        return Bin::where("user_id",$user_id)->get();
    }

    //DELETE BIN
    public function deleteBin($id){
        return Bin::destroy($id);
    }

    //SEND EMAIL 80% - sendEmail = 1 (true)
    public function sendEmailPercent($id){
        $bins = Bin::where('id',$id)->first();
        $user_id = $bins->user_id;
        $material = $bins->name;

        $users = DB::table("users")->where('id',$user_id)->first();
        $email = $users->email;

        if($bins->sendEmail == 0){
            Mail::send('emailPercent',['name' => $material],function($message) use($email){
                $message->from('r4g.recycleteam@gmail.com');
                $message->to($email);
                $message->subject('R4G - Notifica Percentuale');
            });
        }
        $bins->sendEmail = 1;
        $bins->save();
        return array("status" => 200, "message" => "Email Inviata");
    }

    //SET sendEmail = 0 (false)
    public function notSendEmailPercent($id){
        $bins = Bin::where('id',$id)->first();
        $bins->sendEmail = 0;
        return $bins->save();
    }
}
