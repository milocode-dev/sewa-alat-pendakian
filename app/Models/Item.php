<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['category_id', 'item_name', 'description', 'price_per_day', 'stock', 'image'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function detailTransactions()
{
    return $this->hasMany(DetailTransaction::class);
}
}
