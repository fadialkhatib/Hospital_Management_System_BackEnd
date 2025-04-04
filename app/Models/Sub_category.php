<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_category extends Model
{
    protected $fillable = ['name'];
    use HasFactory;


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'cat_items', 'sub_category_id', 'category_id');
    }
    public function items()
    {
        return $this->belongsToMany(Item::class, 'cat_items', 'sub_category_id', 'item_id');
    }
}
