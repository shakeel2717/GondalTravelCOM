<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @property integer $id
 * @property float $commission
 * @property string $created_at
 * @property string $updated_at
 */
class Commission extends Model
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
    protected $fillable = ['commission', 'created_at', 'updated_at'];
}
