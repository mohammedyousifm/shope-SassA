<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Builder;

class GiftCardCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'gift_card_id',
        'tenant_id',
        'code',
        'is_used',
        'used_by'
    ];

    protected static function booted()
    {
        static::addGlobalScope('tenant', function (Builder $builder) {
            if (auth()->check() && auth()->user()->tenant_id) {
                $builder->where('tenant_id', auth()->user()->tenant_id);
            }
        });

        static::creating(function ($model) {
            if (auth()->check() && auth()->user()->tenant_id) {
                $model->tenant_id = auth()->user()->tenant_id;
            }
        });
    }


    /* 🔐 Encrypt before save */
    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = Crypt::encryptString($value);
    }

    /* 🔓 Decrypt when read */
    public function getCodeAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function giftCard()
    {
        return $this->belongsTo(GiftCard::class);
    }

    public function scopeAvailable($query)
    {
        return $query->where('is_used', 0);
    }

    public function usedBy()
    {
        return $this->belongsTo(User::class, 'used_by');
    }
}
