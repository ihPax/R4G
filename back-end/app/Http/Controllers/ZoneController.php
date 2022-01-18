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
}
