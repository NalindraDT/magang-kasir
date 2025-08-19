<?php

namespace App\Controllers;

use App\Models\PembeliModel;

class TransaksiController extends BaseController
{
    protected $pembeliModel;

    public function __construct()
    {
        $this->pembeliModel = new PembeliModel();
    }

    public function index()
    {
        $data['transaksis'] = $this->pembeliModel->findAll();
        return view('transaksi/index', $data);
    }
}
