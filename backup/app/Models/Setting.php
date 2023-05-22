<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = [];
    protected $fillable = ['value'];
    protected $casts = [
        'updated_at' => 'datetime',
    ];
}