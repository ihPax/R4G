<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    //VIEW CALENDAR BY ZONE
    public function zoneCalendar($id){
        return Zone::with(["calendars"])->where("id",$id)->first();
    }

    //LIST ZONE
    public function viewZone(){
        return Zone::all();
    }

    //VIEW CALENDAR OF THE USER'S ZONE
    public function viewCalendarUserZone($id){
        $user = Zone::with(["users","calendars"])->where("id", $id)->first();
        return $user;
    }
}
