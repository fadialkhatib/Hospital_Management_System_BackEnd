<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $fillable = [ 'tender_id', 'bid_id', 'supplier_id', 'contract_number',
                            'start_date', 'end_date', 'total_amount', 'status', 'barcode'];


    public function tender()
    {
        return $this->belongsTo(Tender::class,'tender_id');
    }
    public function bid()
    {
        return $this->belongsTo(Bid::class,'bid_id');
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'supplier_id');
    }

    public function reciepts()
    {
        return $this->hasone(Receipt::class,'contract_id');
    }


}
