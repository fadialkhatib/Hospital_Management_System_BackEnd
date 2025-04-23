<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmArchive extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name','address','date_of_birth','mom_name',
        'chain','gender','case_description','treatment_required'
    ];
}
