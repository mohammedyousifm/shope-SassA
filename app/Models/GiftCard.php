<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GiftCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'value',
        'price',
        'is_active',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function codes()
    {
        return $this->hasMany(GiftCardCode::class);
    }
}
