<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\PembeliModel;

class Home extends BaseController
{
    protected $produkModel;
    protected $pembeliModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->pembeliModel = new PembeliModel();
    }

    public function index()
    {
        return view('landing');
    }

    public function admin()
    {
        // Ambil semua data produk
        $produks = $this->produkModel->findAll();
        $data['jumlah_produk'] = count($produks);

        // Hitung total stok dari semua produk
        $totalStok = 0;
        foreach ($produks as $produk) {
            $totalStok += $produk['stok'];
        }
        $data['total_stok'] = $totalStok;

        // Ambil semua data transaksi
        $transaksis = $this->pembeliModel->findAll();

        // Hitung total penghasilan
        $totalPenghasilan = 0;
        foreach ($transaksis as $transaksi) {
            $totalPenghasilan += $transaksi['total_harga'];
        }
        $data['total_penghasilan'] = 'Rp ' . number_format($totalPenghasilan, 0, ',', '.');

        return view('produk/dashboard', $data);
    }
    
    public function pembeli()
    {
        return view('pembeli/index');
    }
}
