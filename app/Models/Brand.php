<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands';
    protected $fillable = ['category_id', 'name', 'slug', 'status'];

    public function products(){
        return $this->hasMany(Product::class);
    }
    public function categoryy(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
