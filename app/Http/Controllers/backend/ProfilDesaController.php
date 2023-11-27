<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilDesaController extends Controller
{
    public function index()
    {
        $data = ProfilDesa::find(1);
        return view('backend.profil.index', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $profilDesa = ProfilDesa::find($id);

        $validatedData = $request->validate([
            'nama_desa' => 'required|max:255',
            'alamat' => 'required',
            'map' => 'required',
            'jumlah_penduduk' => 'required|integer',
            'telepone' => 'required',
            'email' => 'required|email',
            'deskripsi' => 'required',
            'logo' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi untuk file gambar, opsional
        ]);

        $profilDesa->fill($validatedData);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Nama file unik menggunakan timestamp
            $filePath = $file->storeAs('public/backend', $fileName); // Simpan gambar ke storage Laravel dengan nama unik

            // Hapus logo sebelumnya jika ada
            if ($profilDesa->logo) {
                Storage::delete($profilDesa->logo);
            }

            // Simpan path ke dalam kolom logo di database
            $profilDesa->logo = 'backend/' . $fileName; // Menyimpan path yang bisa diakses publik
        }

        // Simpan perubahan
        $profilDesa->save();

        return redirect('profil')->with('success', 'Data Profil Desa berhasil diperbarui');
    }
}
