<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;

class DepositMethod extends Model
{
    use HasFactory;
    protected $table = 'deposit_methods';

    protected $fillable = [
        'name',
        'tenant_id',
        'account_name',
        'account_number',
        'is_active',
    ];

    public function deposits()
    {
        return $this->hasMany(WalletDeposit::class);
    }

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
}
