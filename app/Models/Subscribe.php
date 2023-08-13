<?php

namespace App\Models;

use App\Mail\SubscriberMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscribe extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['subscriber_email'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $adminEmail = "infodesignwaver@gmail.com";
            Mail::to($adminEmail)->send(new SubscriberMail($item));
        });
    }
}
