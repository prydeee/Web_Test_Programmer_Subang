<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function getIndex()
    {
        $pemesanan = DB::table('pemesanan_tiket')->where('status', '=', 'pending')->count();
        $check_in = DB::table('pemesanan_tiket')->where('status', '=', 'check_in')->count();
        $tiket = DB::table('tiket')->count();

        return view('pages.index', compact('pemesanan', 'check_in', 'tiket'));
    }
}
