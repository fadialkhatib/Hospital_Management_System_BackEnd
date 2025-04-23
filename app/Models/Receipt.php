<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;
    protected $fillable = [ 'contract_id', 'receipt_number','receipt_date',
                            'notes','attachments'];
   
                            
    public function contract()
    {
        return $this->belongsTo(Contract::class,'contract_id');
    }

        public function tender_items()
            {
                return $this->belongsToMany(Tender_item::class,'receipt_items','receipt_id','tender_item_id');
            }

        public function items()
            {
                return $this->belongsToMany(Item::class,'receipt_items','receipt_id','item_id');
            }
}
