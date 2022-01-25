<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    public function calendars(){
        return $this->hasMany(Calendar::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}
