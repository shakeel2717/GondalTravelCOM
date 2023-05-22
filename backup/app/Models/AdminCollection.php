<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_ticket_collector_id
 * @property float $remaining_cash
 * @property string $created_at
 * @property string $updated_at
 * @property UserTicketCollector $userTicketCollector
 */
class AdminCollection extends Model
{
    use HasFactory;
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['collector_id', 'amount', 'remaining_amount',];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */


    public function collector()
    {
        return $this->hasOne('App\Models\User','id','collector_id');
    }
}
