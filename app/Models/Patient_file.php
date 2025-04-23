<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient_file extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id','patient_id','test_result','resident','X_ray_result'
    ];

    public function departments()
    {
        return $this->belongsTo(Department::class,'department_id');
    }
    public function patients()
    {
        return $this->hasOne(Patient::class,'Patient_id');
    }
    
    
}