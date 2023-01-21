@extends('template.app')

@section('title', 'Pemesanan')

@section('content')
<div class="wrap">
    <div class="row">
        <div class="col-lg-12">
            @if(session('success'))
                <div class="alert bg-success">{{ session('success') }}</div>
            @endif
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Data Pemesanan</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        NO</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Nama Pemesan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Kode Tiket</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nama Event</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Waktu & Lokasi Event
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pemesanan_tiket as $i => $p)
                                    <tr>
                                        <td class="align-middle">
                                            <span class="text-secondary text-xs font-weight-bold ps-3">{{ ++$i }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $p->nama }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $p->kode_tiket }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $p->tiket->nama_event }}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-secondary">{{ $p->tiket->waktu_mulai_event->translatedFormat('d F Y, H:i').' | '.$p->tiket->lokasi_event }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <form action="{{ route('pemesanan-tiket.destroy', $p->id) }}" method="POST">
                                                @csrf

                                                @method('DELETE')
                                                <a href="{{ route('pemesanan-tiket.edit', $p->id) }}" class="btn btn-sm btn-warning text-xxs"
                                                    data-toggle="tooltip" data-original-title="Edit Tiket">
                                                    Edit
                                                </a>

                                                <button type="submit" class="btn btn-sm btn-danger text-xxs"
                                                    data-toggle="tooltip" data-original-title="Hapus Tiket">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-xs">Data belum ada :(</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
