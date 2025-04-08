<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    public $fillable = ['type'];

    public function departments()
    {
        return $this->hasMany(Department::class, 'type_id');
    }
}
