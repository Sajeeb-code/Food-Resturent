<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Food extends Model
{
    use HasFactory;
    protected $fillable = ['food_name','description','price','cat_id','image'];

    public function category()
    {
        return $this->hasOne(Category::class,'id','cat_id');
    }
}
