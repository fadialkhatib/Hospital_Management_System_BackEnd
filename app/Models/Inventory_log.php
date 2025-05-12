<?php

namespace App\Models;

use App\Events\InventoryChanged;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory_log extends Model
{
    use HasFactory;



    protected $fillable = [
        'item_id',
        'action_type',
        'quantity',
        'unit_cost',
        'total_cost',
        'reference_type',
        'reference_id',
        'batch_number',
        'expiry_date',
        'notes',
        'department_id'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
