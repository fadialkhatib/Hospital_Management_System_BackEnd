<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid_item extends Model
{
    use HasFactory;
    protected $fillable = [ 'bid_id', 'tender_item_id', 'unit_price', 'total_price', 'currency',
                            'notes'];
}
