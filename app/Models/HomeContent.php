<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'header',
        'banner',
        'sub_title1',
        'sub_title2',
        'sub_title3',
        'content1',
        'content2',
        'content3',
    ];
}
