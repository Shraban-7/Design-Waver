<?php

namespace App\Models;

use App\Mail\OrderMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public function services()
    // {
    //     return $this->belongsTo(Service::class, 'service_id', 'id');
    // }

    // public function packages()
    // {
    //     return $this->belongsTo(Package::class, 'package_id', 'id');
    // }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function order_packages()
    {
        return $this->hasMany(OrderPackage::class, 'order_id', 'id');
    }

    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($item) {
    //         $adminEmail = "shakuatshraboncoc@gmail.com";
    //         Mail::to($adminEmail)->send(new OrderMail($item));
    //     });
    // }

}
