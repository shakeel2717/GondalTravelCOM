<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $contact_no
 * @property string $address
 * @property string $country
 * @property string $city
 * @property string $id_name
 * @property string $id_no
 * @property string $created_at
 * @property string $updated_at
 * @property Ticket[] $tickets
 * @property string age_group
 */
class Passenger extends Model
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
        'ticket_id',
        'name',
        'surname',
        'email',
        'contact_no',
        'age',
        'gender',
        'country',
        'pidname',
        'dob',
        'pidno',
        'pied',
        'created_at',
        'updated_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }
}
