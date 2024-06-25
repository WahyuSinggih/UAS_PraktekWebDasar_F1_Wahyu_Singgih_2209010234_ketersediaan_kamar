@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Reservasi</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Reservasi #{{ $reservasi->id }}</h5>
            <p class="card-text"><strong>Kamar:</strong> {{ $reservasi->kamar->nomor_kamar }}</p>
            <p class="card-text"><strong>Pasien:</strong> {{ $reservasi->pasien->nama }}</p>
            <p class="card-text"><strong>Tanggal Check-in:</strong> {{ $reservasi->tanggal_check_in }}</p>
            <p class="card-text"><strong>Tanggal Check-out:</strong> {{ $reservasi->tanggal_check_out ?? 'Belum check-out' }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $reservasi->status }}</p>
        </div>
    </div>
    <a href="{{ route('reservasi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection