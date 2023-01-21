@extends('template.app')

@section('title', 'Tambah Tiket')

@section('content')
<div class="wrap">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h6>Tambah Tiket</h6>
                </div>
                <div class="card-body pt-0 pb-2">
                    <form action="{{ route('tiket.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_event">Nama Event</label>
                            <input type="text" class="form-control" id="nama_event" placeholder="Nama Event" name="nama_event"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="bintang_tamu">Bintang Tamu</label>
                            <input type="text" class="form-control" id="bintang_tamu" placeholder="Bintang Tamu" name="bintang_tamu"
                            required>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-lg-6">
                                <label for="tanggal_event">Tanggal Event</label>
                                <input type="date" id="tanggal_event" class="form-control" placeholder="Waktu Event"
                                    name="tanggal_event" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="waktu_event">Waktu Event</label>
                                <input type="time" id="waktu_event" class="form-control" placeholder="Waktu Event"
                                    name="waktu_event" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="lokasi_event">Lokasi Event</label>
                            <input type="text" class="form-control" id="lokasi_event" placeholder="Lokasi Event"
                                name="lokasi_event" required>
                        </div>
                       
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">SIMPAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
