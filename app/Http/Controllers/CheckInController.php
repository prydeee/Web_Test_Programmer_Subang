<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemesananTiket;
use Illuminate\Support\Facades\DB;

class CheckInController extends Controller
{
    public function index()
    {
        return view('check-in.index');
    }

    public function store(Request $request)
    {
        $kode_tiket = $request->kode_tiket;

        PemesananTiket::where('kode_tiket', '=', $kode_tiket)
                        ->where('status', '=', 'pending')
                        ->update([
                            'status' => 'check_in',
                            'waktu_check_in' => date('Y-m-d H:i:s')
                        ]);

        return redirect()->route('check-in.index')->with('success', 'Data berhasil disimpan');       
    }

    public function show(Request $request)
    {
        $this->validate($request, [
            'kode_tiket' => 'required'
        ]); 

        $kode_tiket = $request->kode_tiket;

        // cek kode
        $pemesanan_tiket = PemesananTiket::with('tiket')
                                ->where('kode_tiket', '=', $kode_tiket)
                                ->where('status', '=', 'pending')
                                ->first();

        if($pemesanan_tiket) {
            return view('check-in.show', compact('pemesanan_tiket'));
        }

        return redirect()->back()->with('error', 'Kode Tiket tidak ditemukan');
    }
}
