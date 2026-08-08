<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['user_id', 'rent_date', 'expected_return_date', 'price_total', 'status'];

    protected $casts = [
        'rent_date' => 'datetime',
        'expected_return_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(DetailTransaction::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function retur()
    {
        return $this->hasOne(Retur::class);
    }
}