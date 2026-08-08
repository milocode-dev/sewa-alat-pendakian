<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['transaction_id', 'payment_date', 'payment_total', 'payment_method', 'status'];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}