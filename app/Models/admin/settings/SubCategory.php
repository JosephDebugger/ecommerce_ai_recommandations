<?php

namespace App\Models\admin\settings;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\admin\settings\Category;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'sub_cetegory_name',
        'description',
        'category_id'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
