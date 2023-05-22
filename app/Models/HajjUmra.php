<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HajjUmra extends Model
{
    use HasFactory;

    protected $table = 'hajj_umras';
    protected $fillable = [
         'flightpackage_id',
          'start_date', 
          'end_date',
          'total_stay',
          'madina_hotel_name',
          'madina_night_stay',
          'madina_distance',
          'makkah_hotel_name',
          'makkah_night_stay',
          'makkah_distance',
          'chamber_room_price_1',
          'chamber_room_price_2',
          'chamber_room_price_3',
          'chamber_room_price_4',
          'airline_going',
          'airline_return',
          'two_year_price',
          'description',
          'price_from'
          ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    // public function collector()
    // {
    //     return $this->hasOne('App\Models\User','id','collector_id');
    // }
    public function flightpackage()
    {
         return $this->belongsTo(flightpackage::class);
        // return $this->belongsTo(flightpackage::class);
        
    }
}
