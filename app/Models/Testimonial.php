<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = ['user_id', 'message', 'status'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function isApproved(): bool {
        return $this->status === 'Approved';
    }
}