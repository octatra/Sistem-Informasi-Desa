<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilDesa extends Model
{
    use HasFactory;
    protected $table = 'profil_desa';
    protected $fillable = [
        'nama_desa',
        'alamat',
        'map',
        'jumlah_penduduk',
        'telepone',
        'email',
        'deskripsi',
        'logo'
    ];
}
