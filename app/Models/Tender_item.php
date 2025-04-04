<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tender_item extends Model
{
    use HasFactory;
    protected $fillable = [ 'tender_id', 'item_id', 'item_name', 'description', 'quantity',
                            'unit', 'specifications', 'unit_price', 'total_price'];

    public function bids()
        {
            return $this->belongsToMany(Bid::class,'bid_items','tender_item_id','bid_id');
        }

        public function receipts()
        {
            return $this->belongsToMany(Receipt::class,'receipt_items','tender_item_id','receipt_id');
        }
        
        public function items()
        {
            return $this->belongsToMany(Item::class,'receipt_items','tender_item_id','item_id');
        }
    
}