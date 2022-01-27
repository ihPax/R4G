<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class populate_calendar_v2 extends Seeder
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
            'class' => "bg-green-800",
            "zone_id" => 1
        ]);

        DB::table('calendars')->insert([
            'nDay' => 2,
            'material' => "UMIDO",
            'class' => "bg-yellow-800",
            "zone_id" => 1
        ]);

        DB::table('calendars')->insert([
            'nDay' => 3,
            'material' => "SECCO",
            'class' => "bg-gray-600",
            "zone_id" => 1
        ]);

        DB::table('calendars')->insert([
            'nDay' => 4,
            'material' => "PLASTICA/LATTINE",
            'class' => "bg-blue-900",
            "zone_id" => 1
        ]);

        DB::table('calendars')->insert([
            'nDay' => 5,
            'material' => "UMIDO",
            'class' => "bg-yellow-800",
            "zone_id" => 1
        ]);




        DB::table('calendars')->insert([
            'nDay' => 0,
            'material' => "UMIDO",
            'class' => "bg-yellow-800",
            "zone_id" => 2
        ]);

        DB::table('calendars')->insert([
            'nDay' => 1,
            'material' => "PLASTICA/LATTINE",
            'class' => "bg-blue-900",
            "zone_id" => 2
        ]);

        DB::table('calendars')->insert([
            'nDay' => 2,
            'material' => "CARTA",
            'class' => "bg-green-800",
            "zone_id" => 2
        ]);

        DB::table('calendars')->insert([
            'nDay' => 3,
            'material' => "UMIDO",
            'class' => "bg-yellow-800",
            "zone_id" => 2
        ]);

        DB::table('calendars')->insert([
            'nDay' => 4,
            'material' => "SECCO",
            'class' => "bg-gray-600",
            "zone_id" => 2
        ]);

        


        DB::table('calendars')->insert([
            'nDay' => 0,
            'material' => "UMIDO",
            'class' => "bg-yellow-800",
            "zone_id" => 3
        ]);

        DB::table('calendars')->insert([
            'nDay' => 1,
            'material' => "SECCO",
            'class' => "bg-gray-600",
            "zone_id" => 3
        ]);

        DB::table('calendars')->insert([
            'nDay' => 3,
            'material' => "CARTA",
            'class' => "bg-green-800",
            "zone_id" => 3
        ]);

        DB::table('calendars')->insert([
            'nDay' => 4,
            'material' => "UMIDO",
            'class' => "bg-yellow-800",
            "zone_id" => 3
        ]);

        DB::table('calendars')->insert([
            'nDay' => 5,
            'material' => "PLASTICA/LATTINE",
            'class' => "bg-blue-900",
            "zone_id" => 3
        ]);




        DB::table('calendars')->insert([
            'nDay' => 0,
            'material' => "CARTA",
            'class' => "bg-green-800",
            "zone_id" => 4
        ]);

        DB::table('calendars')->insert([
            'nDay' => 1,
            'material' => "UMIDO",
            'class' => "bg-yellow-800",
            "zone_id" => 4
        ]);

        DB::table('calendars')->insert([
            'nDay' => 2,
            'material' => "PLASTICA/LATTINE",
            'class' => "bg-blue-900",
            "zone_id" => 4
        ]);

        DB::table('calendars')->insert([
            'nDay' => 4,
            'material' => "SECCO",
            'class' => "bg-gray-600",
            "zone_id" => 4
        ]);

        DB::table('calendars')->insert([
            'nDay' => 5,
            'material' => "UMIDO",
            'class' => "bg-yellow-800",
            "zone_id" => 4
        ]);
    }
}
