<?php

namespace App\Http\Controllers;

use App\Models\BinUser;
use Illuminate\Http\Request;

class BinUserController extends Controller
{
    //INSERT BIN-USER
    public function save_bin_user(Request $request){
        $data = json_decode($request->getContent());

        $newBinUser = new BinUser();
        $newBinUser->user_id = $data->user_id;
        $newBinUser->bin_id = $data->bin_id;

        $newBinUser->save();
        return $newBinUser;
    }

    //GET BIN-USER
    public function view_bin_userId($user_id){
        return BinUser::where("user_id",$user_id)->first();
    }

    //DELETE BIN-USER
    public function delete_bin_user($id){
        return BinUser::destroy($id);
    }
}
