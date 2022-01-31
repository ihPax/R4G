<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bin extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function zones(){
        return $this->hasManyThrough(Zone::class, User::class);
    }

    public function calendars(){
        return $this->hasManyThrough(Calendar::class, Zone::class);
    }
}
