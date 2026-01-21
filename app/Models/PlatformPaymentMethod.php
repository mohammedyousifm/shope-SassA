<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlatformPaymentMethod extends Model
{
    protected $fillable = [
        'method_name',
        'bank_name',
        'account_name',
        'account_number',
        'is_active',
    ];

    public function payments()
    {
        return $this->hasMany(PlatformPayment::class);
    }
}
