<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shoe extends Model
{
    protected $table = 'shoes';

    protected $fillable = [
        'name',
        'brand',
        'price',
        'size_range',
        'image',
        'sport_type',
    ];
}
