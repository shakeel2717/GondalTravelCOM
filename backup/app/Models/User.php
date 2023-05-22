<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'email_verified_at', 'dob', 'password', 'address', 'img_url', 'city',
        'phone', 'o_auth', 'country', 'state', 'remember_token', 'provider', 'provider_id', 'role', 'status'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return HasOne
     */

    public static function getAdminId()
    {
        return User::where('id', 1)
            ->pluck('id')->
            first();
    }

    public static function getAdminEmail()
    {
        return User::where('id', 1)
            ->pluck('email')->
            first();
    }

    public static function getUserEmail()
    {
        return User::where('id', auth()->id())
            ->pluck('email')
            ->first();
    }

    /**
     * @return HasMany
     */

    public function adminCollections()
    {
        return $this->hasMany('App\Models\AdminCollection', 'cash_collector_id');
    }

}
