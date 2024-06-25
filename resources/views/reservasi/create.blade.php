@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Reservasi</h1>
    <form action="{{ route('reservasi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kamar_id" class="form-label">Kamar</label>
            <select class="form-control" id="kamar_id" name="kamar_id" required>
                @foreach($kamar as $k)
                    <option value="{{ $k->id }}">{{ $k->nomor_kamar }} - {{ $k->tipeKamar->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="pasien_id" class="form-label">Pasien</label>
            <select class="form-control" id="pasien_id" name="pasien_id" required>
                @foreach($pasien as $p)
                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tanggal_check_in" class="form-label">Tanggal Check-in</label>
            <input type="date" class="form-control" id="tanggal_check_in" name="tanggal_check_in" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('reservasi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection