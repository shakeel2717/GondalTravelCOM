<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $to
 * @property string $from
 * @property string $price
 * @property string $flight_number
 * @property string $coach
 * @property string $departure
 * @property string $arrival
 * @property string $age-group
 * @property string $airline
 * @property boolean $status
 * @property string $payment_method
 * @property string $date_range
 * @property float $amount
 * @property string $created_at
 * @property string $updated_at
 * @property PassengerTicket[] $passengerTickets
 * @property UserTicketCollector[] $userTicketCollectors
 * @property UserTicket[] $userTickets
 */
class Ticket extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = [

'details',
        'user_id',
        'prn_no',
        'bags',
        'status',
        'confirmation',
        'payment_status',
        'payment_method',
        'amount',
        'ticket_num',
        'company',
        'destination',
        'departure_date',
        'return_date',
        'p_name',
        'p_surname',
        'contact_no',
        'issued_from',
        'ticket_status',
        'collector_profit',
        'total_amount',
        'received',
        'admin_price',
        'admin_profit',
        'payment_iata',
        'remarks',
        'reminder',
        'last_ticketing_date',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function passengers()
    {
        return $this->hasMany('App\Models\Passenger', 'ticket_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userTicketCollectors()
    {
        return $this->hasMany('App\Models\UserTicketCollector');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User', 'id', 'user_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
