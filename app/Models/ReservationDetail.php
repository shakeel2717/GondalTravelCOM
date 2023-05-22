<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationDetail extends Model
{
    use HasFactory;

    protected $table = 'reservation_details';
    protected $fillable = [
         'reservation_id',
          'name', 
          'first_name',
          'company_name',
          'postal_address',
          'telephone_number',
          'email',
          'dob',
          'passport',
          'nationality',
          'chamber'
          ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    // public function collector()
    // {
    //     return $this->hasOne('App\Models\User','id','collector_id');
    // }
  public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
