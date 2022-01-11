<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class populate_calendar extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('calendars')->insert([
            'nDay' => 1,
            'material' => "CARTA",
            'class' => "bg-blue-900 text-yellow-400 font-bold",
            "zone_id" => 1
        ]);

        DB::table('calendars')->insert([
            'nDay' => 2,
            'material' => "UMIDO",
            'class' => "bg-amber-800 text-white font-bold",
            "zone_id" => 1
        ]);

        DB::table('calendars')->insert([
            'nDay' => 3,
            'material' => "SECCO",
            'class' => "bg-slate-300 text-black fotn-bold",
            "zone_id" => 1
        ]);

        DB::table('calendars')->insert([
            'nDay' => 4,
            'material' => "PLASTICA/LATTINE",
            'class' => "bg-yellow-400 text-blue-900 font-bold",
            "zone_id" => 1
        ]);

        DB::table('calendars')->insert([
            'nDay' => 5,
            'material' => "UMIDO",
            'class' => "bg-amber-800 text-white font-bold",
            "zone_id" => 1
        ]);




        DB::table('calendars')->insert([
            'nDay' => 0,
            'material' => "UMIDO",
            'class' => "bg-amber-800 text-white font-bold",
            "zone_id" => 2
        ]);

        DB::table('calendars')->insert([
            'nDay' => 1,
            'material' => "PLASTICA/LATTINE",
            'class' => "bg-yellow-400 text-blue-900 font-bold",
            "zone_id" => 2
        ]);

        DB::table('calendars')->insert([
            'nDay' => 2,
            'material' => "CARTA",
            'class' => "bg-blue-900 text-yellow-400 font-bold",
            "zone_id" => 2
        ]);

        DB::table('calendars')->insert([
            'nDay' => 3,
            'material' => "UMIDO",
            'class' => "bg-amber-800 text-white font-bold",
            "zone_id" => 2
        ]);

        DB::table('calendars')->insert([
            'nDay' => 4,
            'material' => "SECCO",
            'class' => "bg-slate-300 text-black fotn-bold",
            "zone_id" => 2
        ]);

        


        DB::table('calendars')->insert([
            'nDay' => 0,
            'material' => "UMIDO",
            'class' => "bg-amber-800 text-white font-bold",
            "zone_id" => 3
        ]);

        DB::table('calendars')->insert([
            'nDay' => 1,
            'material' => "SECCO",
            'class' => "bg-slate-300 text-black fotn-bold",
            "zone_id" => 3
        ]);

        DB::table('calendars')->insert([
            'nDay' => 3,
            'material' => "CARTA",
            'class' => "bg-blue-900 text-yellow-400 font-bold",
            "zone_id" => 3
        ]);

        DB::table('calendars')->insert([
            'nDay' => 4,
            'material' => "UMIDO",
            'class' => "bg-amber-800 text-white font-bold",
            "zone_id" => 3
        ]);

        DB::table('calendars')->insert([
            'nDay' => 5,
            'material' => "PLASTICA/LATTINE",
            'class' => "bg-yellow-400 text-blue-900 font-bold",
            "zone_id" => 3
        ]);




        DB::table('calendars')->insert([
            'nDay' => 0,
            'material' => "CARTA",
            'class' => "bg-blue-900 text-yellow-400 font-bold",
            "zone_id" => 4
        ]);

        DB::table('calendars')->insert([
            'nDay' => 1,
            'material' => "UMIDO",
            'class' => "bg-amber-800 text-white font-bold",
            "zone_id" => 4
        ]);

        DB::table('calendars')->insert([
            'nDay' => 2,
            'material' => "PLASTICA/LATTINE",
            'class' => "bg-yellow-400 text-blue-900 font-bold",
            "zone_id" => 4
        ]);

        DB::table('calendars')->insert([
            'nDay' => 4,
            'material' => "SECCO",
            'class' => "bg-slate-300 text-black fotn-bold",
            "zone_id" => 4
        ]);

        DB::table('calendars')->insert([
            'nDay' => 5,
            'material' => "UMIDO",
            'class' => "bg-amber-800 text-white font-bold",
            "zone_id" => 4
        ]);
    }
}
