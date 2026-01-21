<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GameOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'client_id',
        'game_id',
        'game_package_id',
        'player_id',
        'price',
        'status',
    ];

    protected $appends = [
        'status_label',
        'status_badge_class',
    ];

    protected static function booted()
    {
        static::created(function (self $order) {

            if (blank($order->order_number)) {

                $order->updateQuietly([
                    'order_number' => 10000 + $order->id,
                ]);
            }
        });
    }



    // 🏷️ اسم الحالة بالعربي
    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'pending'   => 'قيد الانتظار',
            'completed' => 'مكتمل',
            'failed' => 'ملغي',
            default     => 'غير معروف',
        };
    }

    // 🎨 ألوان الحالة
    public function getStatusBadgeClassAttribute(): string
    {
        return match ($this->status) {
            'pending'   => 'bg-yellow-100 text-yellow-700',
            'completed' => 'bg-green-100 text-green-700',
            'failed' => 'bg-red-100 text-red-700',
            default     => 'bg-gray-100 text-gray-600',
        };
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function package()
    {
        return $this->belongsTo(GamePackage::class, 'game_package_id');
    }
}
