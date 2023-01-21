@extends('template.app')

@section('title', 'Check In')

@section('content')
<div class="wrap">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            @if(session('error'))
                <div class="alert bg-danger text-white">
                    {{ session('error') }}
                </div>
            @endif
            <div class="card mb-4">
                <div class="card-header">
                    <h6>Detail Check In</h6>
                </div>
                <div class="card-body pt-0 pb-2">
                    <form action="{{ route('check-in.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="kode_tiket" value="{{ $pemesanan_tiket->kode_tiket }}">

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between">
                                <strong class="text-xs">Nama Pemesan</strong>
                                <span class="text-xs">{{ $pemesanan_tiket->nama }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong class="text-xs">Kode Tiket</strong>
                                <span class="text-xs">{{ $pemesanan_tiket->kode_tiket }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong class="text-xs">Nama Event</strong>
                                <span class="text-xs">{{ $pemesanan_tiket->tiket->nama_event }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong class="text-xs">Waktu Event</strong>
                                <span class="text-xs">{{ $pemesanan_tiket->tiket->waktu_mulai_event->translatedFormat('d F Y, H:i') }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong class="text-xs">Lokasi Event</strong>
                                <span class="text-xs">{{ $pemesanan_tiket->tiket->lokasi_event }}</span>
                            </li>
                        </ul>
                       
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">CHECK IN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
