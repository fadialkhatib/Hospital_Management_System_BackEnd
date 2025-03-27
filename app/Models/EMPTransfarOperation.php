<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EMPTransfarOperation extends Model
{
    use HasFactory;
    public $fillable = ['patient_id','from_dep_id','to_dep_id'];
}
