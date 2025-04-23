<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;
    protected $fillable = [ 'tender_id', 'supplier_id', 'bid_number', 'total_amount',
                            'tax_amount', 'discount_amount', 'currency', 'valid_until',
                            'status', 'notes'];


    public function tender()
    {
        return $this->belongsTo(Tender::class,'tender_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'supplier_id');
    }

    public function tender_item()
        {
            return $this->belongsToMany(Tender_item::class,'bid_items','bid_id','tender_item_id');
        }

    public function contracts()
        {
            return $this->hasOne(Contract::class,'bid_id');
        }
    
}
