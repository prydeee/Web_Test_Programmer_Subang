@extends('template.app')

@section('title', 'Pemesanan')

@section('content')
<div class="wrap">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h6>Edit Pemesan</h6>
                </div>
                <div class="card-body pt-0 pb-2">
                    <form action="{{ route('pemesanan-tiket.update', $pemesanan_tiket->id) }}" method="POST">
                        @csrf

                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama">Nama Pemesan</label>
                            <input value="{{ $pemesanan_tiket->nama }}" type="text" class="form-control" id="nama" placeholder="Nama Pemesan" name="nama"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="tiket_id">Tiket</label>
                            <select name="tiket_id" class="form-select" required>
                                <option value="">--Pilih Tiket--</option>
                                @foreach($tiket as $t)
                                    <option {{ $t->id == $pemesanan_tiket->tiket_id ? 'selected' : '' }} value="{{ $t->id }}">{{ $t->nama_event }} - {{ $t->waktu_mulai_event->translatedFormat('d F Y, H:i') }}</option>
                                @endforeach
                            </select>
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
