<?php

namespace App\Models\admin\sale;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'sale_date',
        'customer_id',
        'payment_method',
        'total_amount',
    ];    
}
