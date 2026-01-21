<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'price',
        'duration_days',
        'is_active',
        'slug'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }


    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }
}
