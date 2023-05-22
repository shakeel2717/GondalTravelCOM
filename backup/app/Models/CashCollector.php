<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property float $collected_cash
 * @property string $created_at
 * @property string $updated_at
 * @property UserTicketCash $userTicketCollectors
 */
class CashCollector extends Model
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
    protected $fillable = ['collector_id', 'prn_no', 'collected_cash'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
//    public function userTicketCollectors()
//    {
//        return $this->hasMany('App\Models\UserTicketCash');
//    }


}
