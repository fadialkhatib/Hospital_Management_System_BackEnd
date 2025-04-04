<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillabe = ['name','description']; 
    use HasFactory;

    public function sub_categories()
    {
        return $this->belongsToMany(Sub_category::class,// الموديل المرتبط
                                    'cat_items', // اسم جدول الربط
                                    'category_id',// $foreignPivotKey (يشير إلى Category)
                                    'sub_category_id'// $relatedPivotKey (يشير إلى Sub_category)
                                    );
    }
    

    public function items()
    {
        return $this->belongsToMany(Item::class,// الموديل المرتبط
                                    'cat_items',// اسم جدول الربط
                                    'category_id',// $foreignPivotKey (يشير إلى Category)
                                    'item_id'// $relatedPivotKey (يشير إلى Item)
                                    );
    }

    public function Tenders()
    {
        return $this->hasMany(Tender::class,'category_id');
    }
}