<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class collectorcashinhand extends Model
{
    use HasFactory;

    protected $fillable = [
        'collector_id',
        'total_cash_in_hand'
    ];

}
