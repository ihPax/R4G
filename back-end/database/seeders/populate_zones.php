<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class populate_zones extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('zones')->insert([
            'name' => "MONTORIO - MIZZOLE - PIGOTTO - PONTE FLORIO"
        ]);

        DB::table('zones')->insert([
            'name' => "SAN MASSIMO"
        ]);

        DB::table('zones')->insert([
            'name' => "S.FELICE - ZAI MONTORIO - VALPANTENA"
        ]);

        DB::table('zones')->insert([
            'name' => "TORRICELLE - BASSON - LA SORTE - MADONNA DI DOSSOB - CADIDAVID - SACRA FIMIGLIA - LA RIZZA"
        ]);
    }
}
