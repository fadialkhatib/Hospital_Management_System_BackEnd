<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request_item extends Model
{
    use HasFactory;
    public $fillable = ['request_id', 'item_id', 'requested_quantity', 'approved_quantity'];


    public function request()
    {
        return $this->belongsTo(Department_request::class, 'request_id');
    }
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
