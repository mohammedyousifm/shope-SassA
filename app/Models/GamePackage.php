<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GamePackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'name',
        'price',
        'is_active',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
