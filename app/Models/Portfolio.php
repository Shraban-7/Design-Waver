<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    // protected $table = 'portfolio';
    // protected $primaryKey = 'id';
    // public $incrementing = true;
    // protected $keyType = 'int';
    // public $timestamps = true;

    protected $fillable = [
        'portfolio_image',
        'service_id',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
