<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{

    protected $fillable = [
        'name',
        'city',
        'country',
        'iata',
    ];

    protected $appends = [
        'full_name'
    ];


    public function getFullNameAttribute(): string
    {
        return $this->iata.', '.$this->city;
    }

}
