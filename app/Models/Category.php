<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['name', 'slug', 'image', 'description', 'status', 'meta_title', 'meta_keyword', 'meta_description'];

    public function products(){
        return $this->hasMany(Product::class,'category_id', 'id');
    }
    public function related_product(){
        return $this->hasMany(Product::class, 'category_id', 'id')->latest()->take(5);
    }
    public function brands(){
        return $this->hasMany(Brand::class,'category_id', 'id')->where('status', 1);
    }

}
