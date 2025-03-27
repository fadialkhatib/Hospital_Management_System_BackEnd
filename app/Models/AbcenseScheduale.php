<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbcenseScheduale extends Model
{
    use HasFactory;
    protected $fillable = ['employee_id','date_id','vacation'];

}
