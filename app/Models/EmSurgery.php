<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmSurgery extends Model
{
    use HasFactory;
    protected $fillable = ['patient_id'];
    public $timestamps = true;
    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }
}
