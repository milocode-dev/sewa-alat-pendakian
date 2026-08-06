<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
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

    public function return()
    {
        return $this->hasOne(ReturnItem::class);
    }
}
