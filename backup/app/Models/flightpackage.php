<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class flightpackage extends Model
{
    use HasFactory;
    
    public function hajjumrah()
    {
        return $this->hasOne('App\Models\HajjUmra');
    }
}
