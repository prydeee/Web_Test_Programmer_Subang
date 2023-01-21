@extends('template.app')

@section('title', 'Check In')

@section('content')
<div class="wrap">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            @if(session('error'))
                <div class="alert bg-danger">
                    {{ session('error') }}
                </div>
            @elseif(session('success'))
                <div class="alert bg-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card mb-4">
                <div class="card-header">
                    <h6>Check In</h6>
                </div>
                <div class="card-body pt-0 pb-2">
                    <form action="{{ route('check-in.show') }}" method="GET">
                        <div class="mb-3">
                            <label for="kode_tiket">Kode Tiket</label>
                            <input type="text" class="form-control" id="kode_tiket" placeholder="Kode Tiket" name="kode_tiket"
                                required>
                        </div>
                       
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">PROSES</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
