@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Reservasi</h1>
    <a href="{{ route('reservasi.create') }}" class="btn btn-primary mb-3">Tambah Reservasi</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kamar</th>
                <th>Pasien</th>
                <th>Tanggal Check-in</th>
                <th>Tanggal Check-out</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservasi as $r)
            <tr>
                <td>{{ $r->id }}</td>
                <td>{{ $r->kamar->nomor_kamar }}</td>
                <td>{{ $r->pasien->nama }}</td>
                <td>{{ $r->tanggal_check_in }}</td>
                <td>{{ $r->tanggal_check_out }}</td>
                <td>{{ $r->status }}</td>
                <td>
                    <a href="{{ route('reservasi.show', $r->id) }}" class="btn btn-sm btn-info">Detail</a>
                    <a href="{{ route('reservasi.edit', $r->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('reservasi.destroy', $r->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus reservasi ini?')">Hapus</button>
                    </form>
                    @if($r->status == 'aktif')
                        <form action="{{ route('reservasi.check-out', $r->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">Check-out</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection