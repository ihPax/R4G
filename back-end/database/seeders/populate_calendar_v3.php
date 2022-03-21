<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class populate_calendar_v3 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ZONA 1: MONTORIO - MIZZOLE - PIGOTTO - PONTE FLORIO

        //PRIMO GIORNO DOMENICA
        DB::table('calendars')->insert([
            'nDay' => 1,
            'material' => null,
            'class' => null,
            "zone_id" => 1
        ]);  

        DB::table('calendars')->insert([
            'nDay' => 2,
            'material' => "UMIDO",
            'class' => "bg-yellow-800",
            "isOnlySummer" => true,
            "zone_id" => 1
        ]);   

        DB::table('calendars')->insert([
            'nDay' => 3,
            'material' => "CARTA",
            'class' => "bg-green-800",
            "zone_id" => 1
        ]);

        DB::table('calendars')->insert([
            'nDay' => 4,
            'material' => "UMIDO",
            'class' => "bg-yellow-800",
            "zone_id" => 1
        ]);

        DB::table('calendars')->insert([
            'nDay' => 5,
            'material' => "SECCO",
            'class' => "bg-gray-600",
            "zone_id" => 1
        ]);

        DB::table('calendars')->insert([
            'nDay' => 6,
            'material' => "PLASTICA/LATTINE",
            'class' => "bg-blue-900",
            "zone_id" => 1
        ]);

        DB::table('calendars')->insert([
            'nDay' => 7,
            'material' => "UMIDO",
            'class' => "bg-yellow-800",
            "zone_id" => 1
        ]);



        //ZONA 2: SAN MASSIMO

        //PRIMO GIORNO DOMENICA
        DB::table('calendars')->insert([
            'nDay' => 1,
            'material' => null,
            'class' => null,
            "zone_id" => 2
        ]); 

        DB::table('calendars')->insert([
            'nDay' => 2,
            'material' => "UMIDO",
            'class' => "bg-yellow-800",
            "zone_id" => 2
        ]);

        DB::table('calendars')->insert([
            'nDay' => 3,
            'material' => "PLASTICA/LATTINE",
            'class' => "bg-blue-900",
            "zone_id" => 2
        ]);

        DB::table('calendars')->insert([
            'nDay' => 4,
            'material' => "CARTA",
            'class' => "bg-green-800",
            "zone_id" => 2
        ]);

        DB::table('calendars')->insert([
            'nDay' => 5,
            'material' => "UMIDO",
            'class' => "bg-yellow-800",
            "zone_id" => 2
        ]);

        DB::table('calendars')->insert([
            'nDay' => 6,
            'material' => "SECCO",
            'class' => "bg-gray-600",
            "zone_id" => 2
        ]);

        DB::table('calendars')->insert([
            'nDay' => 7,
            'material' => "UMIDO",
            'class' => "bg-yellow-800",
            "isOnlySummer" => true,
            "zone_id" => 2
        ]);

        

        //ZONA 3: S.FELICE - ZAI MONTORIO - VALPANTENA

        //PRIMO GIORNO DOMENICA
        DB::table('calendars')->insert([
            'nDay' => 1,
            'material' => null,
            'class' => null,
            "zone_id" => 3
        ]);  

        DB::table('calendars')->insert([
            'nDay' => 2,
            'material' => "UMIDO",
            'class' => "bg-yellow-800",
            "zone_id" => 3
        ]);

        DB::table('calendars')->insert([
            'nDay' => 3,
            'material' => "SECCO",
            'class' => "bg-gray-600",
            "zone_id" => 3
        ]);

        DB::table('calendars')->insert([
            'nDay' => 4,
            'material' => "UMIDO",
            'class' => "bg-yellow-800",
            "isOnlySummer" => true,
            "zone_id" => 3
        ]);  

        DB::table('calendars')->insert([
            'nDay' => 5,
            'material' => "CARTA",
            'class' => "bg-green-800",
            "zone_id" => 3
        ]);

        DB::table('calendars')->insert([
            'nDay' => 6,
            'material' => "UMIDO",
            'class' => "bg-yellow-800",
            "zone_id" => 3
        ]);

        DB::table('calendars')->insert([
            'nDay' => 7,
            'material' => "PLASTICA/LATTINE",
            'class' => "bg-blue-900",
            "zone_id" => 3
        ]);



        //ZONA 4: TORRICELLE - BASSON - LA SORTE - MADONNA DI DOSSOB - CADIDAVID - SACRA FIMIGLIA - LA RIZZA

        //PRIMO GIORNO DOMENICA
        DB::table('calendars')->insert([
            'nDay' => 1,
            'material' => null,
            'class' => null,
            "zone_id" => 4
        ]);

        DB::table('calendars')->insert([
            'nDay' => 2,
            'material' => "CARTA",
            'class' => "bg-green-800",
            "zone_id" => 4
        ]);

        DB::table('calendars')->insert([
            'nDay' => 3,
            'material' => "UMIDO",
            'class' => "bg-yellow-800",
            "zone_id" => 4
        ]);

        DB::table('calendars')->insert([
            'nDay' => 4,
            'material' => "PLASTICA/LATTINE",
            'class' => "bg-blue-900",
            "zone_id" => 4
        ]);

        DB::table('calendars')->insert([
            'nDay' => 5,
            'material' => "UMIDO",
            'class' => "bg-yellow-800",
            "isOnlySummer" => true,
            "zone_id" => 4
        ]);  

        DB::table('calendars')->insert([
            'nDay' => 6,
            'material' => "SECCO",
            'class' => "bg-gray-600",
            "zone_id" => 4
        ]);

        DB::table('calendars')->insert([
            'nDay' => 7,
            'material' => "UMIDO",
            'class' => "bg-yellow-800",
            "zone_id" => 4
        ]);
    }
}
