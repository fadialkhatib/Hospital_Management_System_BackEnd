<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name','address','date_of_birth','mom_name','chronic_diseases',
        'chain','gender','case_description','treatment_required','blood_type'
    ];

    public function patient_file()
    {
        return $this->hasMany(Patient_file::class);
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class,'department_id');
    }

    public function surgeries()
    {
        return $this->hasMany(Surgery::class);
    }
}
