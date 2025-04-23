<?php

namespace App\Models;

use App\Events\InventoryChanged;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;


    protected $dispatchesEvents = [
        'created' => InventoryChanged::class,
        'updated' => InventoryChanged::class,
        'deleted' => InventoryChanged::class,
    ];


    protected $fillable = [
        'name',
        'code',
        'description',
        'barcode',
        'qr_code_path',
        'unit',
        'weight',
        'current_quantity',
        'min_quantity',
        'cost',
        'is_expirable',
        'supplier_id'
    ];


    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'cat_items', 'item_id', 'category_id');
    }

    public function sub_categories()
    {
        return $this->belongsToMany(Sub_category::class, 'cat_items', 'item_id', 'sub_category_id');
    }

    public function tenders()
    {
        return $this->belongsToMany(Tender::class, 'tender_items', 'item_id', 'tender_id');
    }

    public function logs()
    {
        return $this->hasOne(Inventory_log::class, 'item_id');
    }


    public function tender_items()
    {
        return $this->belongsToMany(Tender_item::class, 'receipt_item', 'item_id', 'tender_item_id');
    }

    public function receipts()
    {
        return $this->belongsToMany(Receipt::class, 'receipt_item', 'item_id', 'receipt_id');
    }
}
