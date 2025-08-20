<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\PembeliModel;

class PembeliController extends BaseController
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
        $data['produks'] = $this->produkModel->findAll();
        $data['keranjang'] = $this->pembeliModel->findAll();
        $data['jumlah_keranjang'] = $this->pembeliModel->countAllResults();
        return view('pembeli/index', $data);
    }

    public function beli()
    {
        $id_produk = $this->request->getPost('id_produk');
        $kuantitas = $this->request->getPost('kuantitas');

        $produk = $this->produkModel->find($id_produk);

        if ($produk && $kuantitas > 0 && $produk['stok'] >= $kuantitas) {
            $data_pembeli = [
                'id_produk' => $id_produk,
                'nama_produk' => $produk['nama_produk'],
                'stok' => $kuantitas,
                'harga' => $produk['harga'],
                'total_harga' => $kuantitas * $produk['harga'],
                'status' => 'Sukses'
            ];

            $this->pembeliModel->save($data_pembeli);

            $new_stok = $produk['stok'] - $kuantitas;
            $this->produkModel->update($id_produk, ['stok' => $new_stok]);

            session()->setFlashdata('message', 'Pembelian berhasil!');
        } else {
            session()->setFlashdata('error', 'Pembelian gagal. Stok tidak mencukupi atau data tidak valid.');
        }

        return redirect()->to(base_url('pembeli'));
    }

    public function removeFromCart($id_pembeli)
    {
        $item = $this->pembeliModel->find($id_pembeli);

        if ($item) {
            $produk = $this->produkModel->find($item['id_produk']);

            if ($produk) {
                $new_stok = $produk['stok'] + $item['stok'];
                $this->produkModel->update($produk['id_produk'], ['stok' => $new_stok]);
            }

            $this->pembeliModel->delete($id_pembeli);
            
            session()->setFlashdata('message', 'Produk berhasil dihapus dari keranjang!');
        } else {
            session()->setFlashdata('error', 'Item keranjang tidak ditemukan.');
        }

        return redirect()->to(base_url('pembeli'));
    }

    public function cetakNota()
    {
        $data['keranjang'] = $this->pembeliModel->findAll();
        return view('pembeli/nota', $data);
    }
    
    public function updateCart($id_pembeli)
    {
        $newStok = $this->request->getPost('stok');

        // Ambil data item keranjang yang lama
        $itemLama = $this->pembeliModel->find($id_pembeli);

        if (!$itemLama) {
            session()->setFlashdata('error', 'Item keranjang tidak ditemukan.');
            return redirect()->to(base_url('pembeli'));
        }

        // Ambil data produk terkait
        $produk = $this->produkModel->find($itemLama['id_produk']);

        if (!$produk) {
            session()->setFlashdata('error', 'Produk tidak ditemukan.');
            return redirect()->to(base_url('pembeli'));
        }

        // Hitung selisih stok
        $stokTabelProduk = $produk['stok'] + $itemLama['stok'] - $newStok;

        if ($stokTabelProduk < 0) {
            session()->setFlashdata('error', 'Stok tidak mencukupi.');
            return redirect()->to(base_url('pembeli'));
        }

        // Perbarui data di tabel pembeli
        $data_update = [
            'stok' => $newStok,
            'total_harga' => $newStok * $itemLama['harga']
        ];
        $this->pembeliModel->update($id_pembeli, $data_update);

        // Perbarui stok di tabel produk
        $this->produkModel->update($produk['id_produk'], ['stok' => $stokTabelProduk]);

        session()->setFlashdata('message', 'Keranjang berhasil diupdate!');
        return redirect()->to(base_url('pembeli'));
    }
}