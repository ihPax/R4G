<?php

namespace App\Http\Controllers;

use App\Models\Bin;
use App\Models\Calendar;
use App\Models\User;
use Illuminate\Http\Request;

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
        $bin = Bin::with(["zones"])->where("id",$id)->first();
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
}
