<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['name','commerical_number','type','address','email','is_approved','notes'];
    use HasFactory;


    public function item()
    {
        return $this->hasMany(Item::class,'supplier_id');
    }

    public function bids()
    {
        return $this->hasMany(Bid::class,'supplier_id');
    }

    public function contracts()
    {
        return $this->hasOne(Contract::class,'supplier_id');
    }
}
