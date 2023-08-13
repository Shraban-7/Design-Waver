<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'package_name',
        'package_price',
        'package_status',
        'home_view',
        'position',
        'delivery_time',
        'offer_package_price',
        'offer_price_start_date',
        'offer_price_end_date',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    // public function attributes()
    // {
    //     return $this->hasMany(Attribute::class);
    // }

    public function order()
    {
        return $this->hasMany(OrderPackage::class, 'package_id', 'id');
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'attribute_package', 'package_id', 'attribute_id');
    }

    public function order_packages()
    {
        return $this->hasMany(OrderPackage::class, 'package_id', 'id');
    }
}
