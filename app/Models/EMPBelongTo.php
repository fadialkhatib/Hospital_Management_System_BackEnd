<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EMPBelongTo extends Model
{
    use HasFactory;
    public $fillable = ['patient_id', 'dep_id'];
}
