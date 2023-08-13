<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPackage extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function services()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    public function packages()
    {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }

    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
