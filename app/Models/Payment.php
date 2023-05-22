<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Payment extends Model
{
    use HasFactory;

    public function scopeSearch($query, $val)
    {
        return $query->where('payer_email', 'LIKE', '%' . $val . '%');
    }

    public static function filterPays(Request $request)
    {
        return Payment::with('user')
            ->where('created_at',  $request->get('year'))
            ->orWhere('amount', $request->get('amount'))
            ->orWhere('payment_status',  $request->get('status'))->get();
    }

    public static function loadPays()
    {
        return Payment::with('user')->orderBy('created_at', 'ASC')->paginate(10);
    }
}
