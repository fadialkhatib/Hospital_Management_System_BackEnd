<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat_item extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'sub_id', 'item_id'];
}
