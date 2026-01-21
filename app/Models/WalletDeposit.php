<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WalletDeposit extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'deposit_method_id',
        'amount',
        'transaction_reference',
        'status',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function method()
    {
        return $this->belongsTo(DepositMethod::class, 'deposit_method_id');
    }
}
