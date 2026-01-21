<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Client extends Authenticatable
{
    use Notifiable;

    protected $fillable =
    [
        'tenant_id',
        'client_number',
        'name',
        'email',
        'is_blocked',
        'email_verified_at',
        'password'
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    protected static function booted()
    {
        static::addGlobalScope('tenant', function (Builder $builder) {
            if (auth()->check() && auth()->user()->tenant_id) {
                $builder->where(
                    'tenant_id',
                    auth()->user()->tenant_id
                );
            }
        });

        static::created(function ($client) {
            if (blank($client->client_number)) {
                $client->updateQuietly([
                    'client_number' => 'CL-' . str_pad($client->id, 5, '0', STR_PAD_LEFT),
                ]);
            }
        });
    }
}
