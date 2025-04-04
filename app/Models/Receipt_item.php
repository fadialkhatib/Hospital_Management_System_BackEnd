<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt_item extends Model
{
    use HasFactory;
    protected $fillable = [ 'receipt_id','tender_item_id','item_id','quantity_ordered','quantity_received',
                            'production_date','expiry_date','unit_price','total_price','storage_location'];
    
}
