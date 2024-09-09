<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_name'
    ];

    public function siswas()
    {
        return $this->hasMany(Siswa::class, 'school_class_id');
    }
}
