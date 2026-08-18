<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['category_id', 'item_name', 'description', 'price_per_day', 'stock', 'image'];

    // Relasi ke Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi ke DetailTransaction
    public function detailTransactions()
    {
        return $this->hasMany(DetailTransaction::class);
    }

    public function rentals()
    {
        return $this->hasMany(Transaction::class); // Sesuaikan nama model transaksi kamu (misal: Transaction / Rental)
    }

    // Relasi ke ulasan/rating (jika ada tabel ulasan)
    // public function reviews()
    // {
    //     return $this->hasMany(Review::class);
    // }
}