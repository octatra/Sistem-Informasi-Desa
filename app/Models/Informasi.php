<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Informasi extends Model
{
    use HasFactory;
    protected $table = 'informasi';
    protected $fillable = ['judul', 'kategori', 'image', 'deskripsi', 'published_at'];

    public function getPublishedAtFormattedAttribute()
    {
        return Carbon::parse($this->published_at)->isoFormat('MMM DD, YYYY');
    }
}
