<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class Contact extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'email',
        'service_name',
        'message',
        'phone',
        'is_read'
    ];

    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($item) {
    //         $adminEmail = "infodesignwaver@gmail.com";
    //         Mail::to($adminEmail)->send(new ContactMail($item));
    //     });
    // }
}
