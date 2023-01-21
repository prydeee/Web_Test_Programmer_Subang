<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemesananTiket;

class LaporanController extends Controller
{
    public function index()
    {
        $pemesanan_tiket = PemesananTiket::latest()
                                        ->get();

        return view('laporan.index', compact('pemesanan_tiket'));
    }
}
