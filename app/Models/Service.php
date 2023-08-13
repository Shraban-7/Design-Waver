<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_name',
        'slug',
        'service_banner', // 'service_banner
        'service_title',
        'service_image',
        'service_description',
        'service_process',
        'service_status',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'project',
        'client',
        'review',
    ];

    public function package(): HasMany
    {
        return $this->hasMany(Package::class, 'service_id', 'id');
    }

    public function order()
    {
        return $this->hasMany(OrderPackage::class, 'service_id', 'id');
    }

    public function attributes(): HasMany
    {
        return $this->hasMany(Attribute::class);
    }

    public function portfolio(): HasMany
    {
        return $this->hasMany(Portfolio::class);
    }
}
