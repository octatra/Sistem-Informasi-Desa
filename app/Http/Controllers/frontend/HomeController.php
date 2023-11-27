<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use App\Models\Produk;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $data = ProfilDesa::find(1);
        $informasiSlide = Informasi::latest()->take(3)->get();
        $produk = Produk::latest()->take(4)->get();
        $informasiAll = Informasi::all();
        return view("frontend.home.index", ['data' => $data, 'informasiSlide' => $informasiSlide, 'produk' => $produk, 'informasiAll' => $informasiAll]);
    }

    public function profil()
    {
        $data = ProfilDesa::find(1);
        $informasiSlide = Informasi::latest()->take(4)->get();
        $produk = Produk::latest()->take(4)->get();
        $informasiAll = Informasi::latest()->take(6)->get();

        return view("frontend.profil.index", ['data' => $data, 'informasiSlide' => $informasiSlide, 'produk' => $produk, 'informasiAll' => $informasiAll]);
    }

    public function informasiAll()
    {
        $data = ProfilDesa::find(1);
        $informasiSlide = Informasi::latest()->take(3)->get();
        $produk = Produk::latest()->take(4)->get();
        $informasiAll = Informasi::all();
        return view("frontend.informasi.index", ['data' => $data, 'informasiSlide' => $informasiSlide, 'produk' => $produk, 'informasiAll' => $informasiAll]);
    }

    public function detailInformasi($id)
    {
        $detail = Informasi::findOrFail($id);
        $data = ProfilDesa::find(1);
        $informasiSlide = Informasi::latest()->take(3)->get();
        $produk = Produk::latest()->take(4)->get();
        $informasiAll = Informasi::all();
        return view("frontend.informasi.detail", ['detail' => $detail, 'data' => $data, 'informasiSlide' => $informasiSlide, 'produk' => $produk, 'informasiAll' => $informasiAll]);
    }

    public function produkAll()
    {
        $data = ProfilDesa::find(1);
        $informasiSlide = Informasi::latest()->take(3)->get();
        $produk = Produk::latest()->take(4)->get();
        $informasiAll = Informasi::all();
        $dataProduk = Produk::all();
        return view("frontend.produk.index", ['dataProduk' => $dataProduk, 'data' => $data, 'informasiSlide' => $informasiSlide, 'produk' => $produk, 'informasiAll' => $informasiAll]);
    }

    public function detailProduk($id)
    {
        $detail = Produk::findOrFail($id);
        $data = ProfilDesa::find(1);
        $informasiSlide = Informasi::latest()->take(3)->get();
        $produk = Produk::latest()->take(4)->get();
        $informasiAll = Informasi::all();
        return view("frontend.produk.detail", ['detail' => $detail, 'data' => $data, 'informasiSlide' => $informasiSlide, 'produk' => $produk, 'informasiAll' => $informasiAll]);
    }
}
