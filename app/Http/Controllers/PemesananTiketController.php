<?php

namespace App\Http\Controllers;

use App\Models\PemesananTiket;
use App\Models\Tiket;
use Illuminate\Http\Request;

class PemesananTiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiket = Tiket::orderBy('waktu_mulai_event', 'ASC')->get();

        return view('pemesanan-tiket.index', compact('tiket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kode_tiket = date('dmyhis');

        $p = PemesananTiket::create([
            'nama' => $request->nama,
            'tiket_id' => $request->tiket_id
        ]);

        $kode_tiket = $kode_tiket.$p->id;

        PemesananTiket::find($p->id)->update([
            'kode_tiket' => $kode_tiket
        ]);

        return redirect('/pesan-tiket/'.$kode_tiket);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kode_tiket)
    {
        $pemesanan_tiket = PemesananTiket::with('tiket')
                                        ->where('kode_tiket', '=', $kode_tiket)
                                        ->where('status', '=', 'pending')
                                        ->firstOrFail();

        return view('pemesanan-tiket.show', compact('pemesanan_tiket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PemesananTiket $pemesanan_tiket)
    {
        $tiket = Tiket::orderBy('waktu_mulai_event', 'ASC')->get();

        return view('pemesanan-tiket.admin.edit', compact('pemesanan_tiket', 'tiket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PemesananTiket $pemesanan_tiket)
    {
        $pemesanan_tiket->update([
            'nama' => $request->nama,
            'tiket_id' => $request->tiket_id
        ]);

        return redirect()->route('pemesanan-tiket.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PemesananTiket $pemesanan_tiket)
    {
        $pemesanan_tiket->delete();

        return redirect()->route('pemesanan-tiket.index')->with('success', 'Data berhasil dihapus');
    }

    public function indexAdmin()
    {
        $pemesanan_tiket = PemesananTiket::where('status', '=', 'pending')
                                        ->latest()
                                        ->get();

        return view('pemesanan-tiket.admin.index', compact('pemesanan_tiket'));
    }
}
