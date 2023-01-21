@extends('template.app')

@section('title', 'Tiket')

@section('content')
<div class="wrap">
    <div class="row">
        <div class="col-lg-12">
            @if(session('success'))
                <div class="alert bg-success">{{ session('success') }}</div>
            @endif
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex align-items-center justify-content-between">
                    <h6>Data Tiket</h6>

                    <div>
                        <a class="btn bg-gradient-success" href="{{ route('tiket.create') }}">Tambah Data</a>
                    </div>
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
                                        Nama Event</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Bintang Tamu</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Waktu</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Lokasi
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tiket as $i => $t)
                                    <tr>
                                        <td class="align-middle">
                                            <span class="text-secondary text-xs font-weight-bold ps-3">{{ ++$i }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $t->nama_event }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $t->bintang_tamu }}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-secondary">{{ $t->waktu_mulai_event->translatedFormat('d F Y, H:i') }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $t->lokasi_event }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <form action="{{ route('tiket.destroy', $t->id) }}" method="POST">
                                                @csrf

                                                @method('DELETE')
                                                <a href="{{ route('tiket.edit', $t->id) }}" class="btn btn-sm btn-warning text-xxs"
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
