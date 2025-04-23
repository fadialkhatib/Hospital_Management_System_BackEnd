<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    use HasFactory;
    protected $fillable = [ 'title','tender_number','description','release_date',
                            'closing_date','budget','status','barcode','category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function bids()
    {
        return $this->hasMany(Bid::class,'tender_id');
    }
    public function items()
    {
        return $this->belongsToMany(Item::class,'tender_items','tender_id','item_id');
    }

    public function contracts()
    {
        return $this->hasone(Contract::class,'tender_id');
    }
}
