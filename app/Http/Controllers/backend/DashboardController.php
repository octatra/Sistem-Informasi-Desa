<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use App\Models\Produk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $informasi = Informasi::count();
        $produk = Produk::count();

        return view('backend.dashboard.index', ['informasi' => $informasi, 'produk' => $produk]);
    }
}
