<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function absensi_mahasiswa()
    {
        return $this->hasOne(AbsensiMahasiswa::class);
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
}
