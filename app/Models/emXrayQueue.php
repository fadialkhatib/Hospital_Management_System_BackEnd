<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmXrayQueue extends Model
{
    use HasFactory;
    protected $fillable = ['patient_id'] ;

    public function patient()
    {
        return $this->belongsTo(Empatient::class,'patient_id');
    }
}
