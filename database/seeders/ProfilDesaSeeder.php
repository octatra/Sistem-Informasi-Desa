<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profil_desa')->insert([
            'nama_desa' => 'Desa Tegal Maja',
            'alamat' => 'Jl. Contoh No. 123',
            'map' => '123.456,-78.910', // Koordinat peta jika ada
            'jumlah_penduduk' => 5000,
            'telepone' => '08123456789',
            'email' => 'contoh@desa.com',
            'deskripsi' => 'Deskripsi tentang contoh desa.',
            'logo' => 'link_ke_logo_gambar.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // php artisan db:seed --class=ProfilDesaSeeder
    }
}
