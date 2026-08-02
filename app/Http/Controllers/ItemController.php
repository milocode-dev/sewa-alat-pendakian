<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index()
    {
        // Ambil semua produk dari database
        $produkPopuler = Produk::all();

        return view('katalog', compact('produkPopuler'));
    }
}