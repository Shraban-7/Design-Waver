<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'attribute_name',
        'service_id'
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
