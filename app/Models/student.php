<?php

namespace App\Models;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class student extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'nip',
        'name',
        'phone',
        'gender',
    ];

    public function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'class_id');
    }
}
