<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CalendarController extends Controller
{
    //SEND EMAIL NOME RIFIUTO DEL GIORNO DOPO
    public function sendEmailCalendar(){
        $today = Carbon::now();
        $result = $today->dayOfWeek;
        $dayOfWeek = $result;

        $tomorrow = CarbonImmutable::now()->add(1,'day');
        $calendars = DB::table("calendars")->where("nDay",$dayOfWeek)->get();
        
        foreach($calendars as $calendar){
            $material = $calendar->material;
            $zone_id = $calendar->zone_id;

            $materialBin = DB::table("bins")->where("name",$material)->first();
            $allUser = DB::table("users")->where("zone_id", $zone_id)->get();
            foreach($allUser as $user){
                $email = $user->email;
                Mail::send('emailCalendar',['name' => $material, 'tomorrow' => $tomorrow->isoFormat('dddd D MMMM')],function($message) use($email){
                    $message->from('r4g.recycleteam@gmail.com');
                    $message->to($email);
                    $message->subject('R4G - Notifica Raccolta Rifiuto');
                });
            }
        }
        return array("status" => 200, "message" => "Email Inviata");
    }
}
