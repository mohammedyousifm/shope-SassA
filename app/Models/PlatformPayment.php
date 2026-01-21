<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlatformPayment extends Model
{
    protected $fillable = [
        'tenant_id',
        'plan_id',
        'platform_payment_method_id',
        'transaction_reference',
        'amount',
        'status',
        'approved_at'
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function method()
    {
        return $this->belongsTo(PlatformPaymentMethod::class, 'platform_payment_method_id');
    }
}
