<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'foto',
        'tanggal_lahir',
        'school_class_id',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date:Y-m-d', // Meng-cast tanggal_lahir sebagai date
    ];


    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'school_class_id');
    }
}
