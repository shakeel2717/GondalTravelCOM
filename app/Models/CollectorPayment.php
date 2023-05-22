<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectorPayment extends Model
{
    use HasFactory;

    protected $fillable = ['collector_id', 'paidamount', 'remaining_amount',];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function collector()
    {
        return $this->hasOne('App\Models\User','id','collector_id');
    }
}
