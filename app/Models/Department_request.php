<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department_request extends Model
{
    use HasFactory;
    public $fillable = ['department_id', 'status', 'notes'];

    public function itemss()
    {
        return $this->hasMany(Request_item::class, 'request_id',);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
