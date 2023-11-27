<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $fillable = ['nama_produk', 'image', 'kategori', 'sumber', 'telpone', 'deskripsi', 'published_at'];

    public function getPublishedAtFormattedAttribute()
    {
        return Carbon::parse($this->published_at)->isoFormat('MMM DD, YYYY');
    }
}
