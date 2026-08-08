<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Retur extends Model
{
    protected $table = 'returns';

    protected $fillable = ['transaction_id', 'return_date', 'late_days', 'denda', 'note'];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}