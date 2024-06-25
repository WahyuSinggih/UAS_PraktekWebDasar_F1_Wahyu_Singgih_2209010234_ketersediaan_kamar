@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Reservasi</h1>
    <form action="{{ route('reservasi.update', $reservasi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="kamar_id" class="form-label">Kamar</label>
            <select class="form-control" id="kamar_id" name="kamar_id" required>
                @foreach($kamar as $k)
                    <option value="{{ $k->id }}" {{ $reservasi->kamar_id == $k->id ? 'selected' : '' }}>
                        {{ $k->nomor_kamar }} - {{ $k->tipeKamar->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="pasien_id" class="form-label">Pasien</label>
            <select class="form-control" id="pasien_id" name="pasien_id" required>
                @foreach($pasien as $p)
                    <option value="{{ $p->id }}" {{ $reservasi->pasien_id == $p->id ? 'selected' : '' }}>
                        {{ $p->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tanggal_check_in" class="form-label">Tanggal Check-in</label>
            <input type="date" class="form-control" id="tanggal_check_in" name="tanggal_check_in" value="{{ $reservasi->tanggal_check_in }}" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_check_out" class="form-label">Tanggal Check-out</label>
            <input type="date" class="form-control" id="tanggal_check_out" name="tanggal_check_out" value="{{ $reservasi->tanggal_check_out }}">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="aktif" {{ $reservasi->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="selesai" {{ $reservasi->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('reservasi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection