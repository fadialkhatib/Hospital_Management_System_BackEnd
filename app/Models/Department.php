<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'password',
        'name',
        'type_id'
    ];
    protected $hidden = ['password'];

    public $timestamps = true;

    public function login()
    {
        return $this->hasOne(Login::class,);
    }

    public function patient_file()
    {
        return $this->hasMany(Patient_file::class);
    }

    public function file_archive()
    {
        return $this->hasMany(FilesArchive::class);
    }

    public function patient()
    {
        return $this->belongsToMany(Patient::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
