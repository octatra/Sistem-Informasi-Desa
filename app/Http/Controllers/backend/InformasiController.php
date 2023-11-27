<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    public function index()
    {
        $data = Informasi::all();
        return view('backend.informasi.index', ['data' => $data]);
    }

    public function create()
    {
        return view('backend.informasi.create');
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'published_at' => now()
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Nama file unik menggunakan timestamp
            $filePath = $file->storeAs('public/backend', $fileName); // Simpan gambar ke storage Laravel dengan nama unik

            $validatedData['image'] = 'backend/' . $fileName;
        }

        Informasi::create($validatedData);

        return redirect('informasi')->with('success', 'Informasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Informasi::findOrFail($id);
        return view('backend.informasi.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $informasi = Informasi::find($id);

        $validatedData = $request->validate([
            'judul' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'published_at' => now()
        ]);

        $informasi->fill($validatedData);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Nama file unik menggunakan timestamp
            $filePath = $file->storeAs('public/backend', $fileName); // Simpan gambar ke storage Laravel dengan nama unik

            // Hapus logo sebelumnya jika ada
            if ($informasi->logo) {
                Storage::delete($informasi->logo);
            }

            // Simpan path ke dalam kolom logo di database
            $informasi->logo = 'backend/' . $fileName; // Menyimpan path yang bisa diakses publik
        }

        $informasi->save();

        return redirect('informasi')->with('success', 'Informasi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $information = Informasi::findOrFail($id);
        $information->delete();
        return redirect('informasi')->with('success', 'Informasi berhasil dihapus');
    }
}
