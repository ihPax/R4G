<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class DailyEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quote:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Invio email giornaliera sul rifiuto del giorno dopo';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
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
        return Command::SUCCESS;
    }
}
