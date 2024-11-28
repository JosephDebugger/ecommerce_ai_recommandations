<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rating extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'rating',
    ];
}