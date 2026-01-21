<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GiftCardOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'order_number',
        'gift_card_code_id',
        'price',
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




    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function code()
    {
        return $this->belongsTo(GiftCardCode::class, 'gift_card_code_id');
    }

    public function giftCard()
    {
        return $this->belongsTo(GiftCard::class);
    }
}
