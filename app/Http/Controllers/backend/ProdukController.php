<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        $data = Produk::all();
        return view('backend.produk.index', ['data' => $data]);
    }

    public function create()
    {
        return view('backend.produk.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_produk' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'required',
            'sumber' => 'required',
            'telpone' => 'required',
            'deskripsi' => 'required',
            'published_at' => now()
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Nama file unik menggunakan timestamp
            $filePath = $file->storeAs('public/backend', $fileName); // Simpan gambar ke storage Laravel dengan nama unik

            $validatedData['image'] = 'backend/' . $fileName;
        }

        Produk::create($validatedData);

        return redirect('produk')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Produk::findOrFail($id);
        return view('backend.produk.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $Produk = Produk::find($id);

        $validatedData = $request->validate([
            'nama_produk' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'required',
            'sumber' => 'required',
            'telpone' => 'required',
            'deskripsi' => 'required',
            'published_at' => now()
        ]);

        $Produk->fill($validatedData);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Nama file unik menggunakan timestamp
            $filePath = $file->storeAs('public/backend', $fileName); // Simpan gambar ke storage Laravel dengan nama unik

            // Hapus logo sebelumnya jika ada
            if ($Produk->logo) {
                Storage::delete($Produk->logo);
            }

            // Simpan path ke dalam kolom logo di database
            $Produk->logo = 'backend/' . $fileName; // Menyimpan path yang bisa diakses publik
        }

        $Produk->save();

        return redirect('produk')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy($id)
    {
        $information = Produk::findOrFail($id);
        $information->delete();
        return redirect('produk')->with('success', 'Produk berhasil dihapus');
    }
}
