<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\TenantScope;

class Tenant extends Model
{
    protected $fillable = ['name', 'subdomain', 'status', 'plan_id', 'subscription_ends_at'];

    protected $casts = [
        'subscription_ends_at' => 'date',
    ];

    /**
     * Check if subscription is still active
     */
    public function isSubscriptionActive(): bool
    {
        if (!$this->subscription_ends_at) {
            return false;
        }

        return $this->subscription_ends_at->isFuture();
    }

    /**
     * Check if subscription is expired
     */
    public function isSubscriptionExpired(): bool
    {
        return $this->subscription_ends_at?->isPast() ?? false;
    }


    public function user()
    {
        return $this->hasOne(User::class);
    }


    protected static function booted()
    {
        static::addGlobalScope(new TenantScope);
    }

    // ✅ ADD THIS
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
