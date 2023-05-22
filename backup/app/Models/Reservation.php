<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';
    protected $fillable = [
         'hajjumra_id',
          'total_amount', 
          'amount_pending',
          ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    // public function collector()
    // {
    //     return $this->hasOne('App\Models\User','id','collector_id');
    // }
    public function reservation_details()
    {
        return $this->HasMany(App\Models\ReservationDetail::class);
    }
    // public function hajjumra()
    // {
    //     // return $this->belongsTo(App\Models\HajjUmra::class);
    //     // return $this->belongsTo(HajjUmra::class,'id');
    //     // return $this->belongsTo(HajjUmra::class, 'hajjumra_id');
    //             return $this->belongsTo('App\Models\HajjUmra','hajjumra_id');

    // }
    public function flightpackage()
    {
        // return $this->belongsTo(App\Models\flightpackage::class);
            return $this->belongsTo(flightpackage::class ,'hajjumra_id');
    }
}
