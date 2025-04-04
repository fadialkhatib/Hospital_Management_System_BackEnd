<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilesArchive extends Model
{
    use HasFactory;
    public $fillable = ['full_name','address','date_of_birth','mom_name','test_result','X_ray_result','resident','gender','chain','department_id'];


public function depatment()
    {
        return $this->belongsTo(Department::class,'department_id');
    }

}
