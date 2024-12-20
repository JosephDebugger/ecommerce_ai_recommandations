<?php

namespace App\Models\admin\settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\settings\SubCategory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['id','name','type','description','status'];
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }
}
