<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

     protected $fillable = [
        'coupon_code',
        'coupon_type',
        'coupon_value',
        'coupon_used',
        'max_used',
        'coupon_start_date',
        'coupon_end_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
