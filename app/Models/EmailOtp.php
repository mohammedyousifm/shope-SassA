<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class EmailOtp extends Model
{
    protected $table = 'email_otps';

    protected $fillable = [
        'email',
        'code',
        'type',        // client | tenant
        'expires_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    /**
     * Check if OTP is expired
     */
    public function isExpired(): bool
    {
        return $this->expires_at->isPast();
    }

    /**
     * Scope: valid (not expired)
     */
    public function scopeValid($query)
    {
        return $query->where('expires_at', '>', now());
    }
}
