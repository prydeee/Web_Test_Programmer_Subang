<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiket = Tiket::orderBy('waktu_mulai_event', 'ASC')->get();

        return view('tiket.index', compact('tiket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tiket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tiket::create([
           'nama_event' => $request->nama_event,
           'bintang_tamu' => $request->bintang_tamu,
           'lokasi_event' => $request->lokasi_event,
           'waktu_mulai_event' => $request->tanggal_event.' '.$request->waktu_event 
        ]);

        return redirect()->route('tiket.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tiket $tiket)
    {
        return view('tiket.edit', compact('tiket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tiket $tiket)
    {
        $tiket->update([
            'nama_event' => $request->nama_event,
            'bintang_tamu' => $request->bintang_tamu,
            'lokasi_event' => $request->lokasi_event,
            'waktu_mulai_event' => $request->tanggal_event.' '.$request->waktu_event 
        ]);

        return redirect()->route('tiket.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tiket $tiket)
    {
        $tiket->delete();

        return redirect()->route('tiket.index')->with('success', 'Data berhasil dihapus');
    }
}
