@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Kamar</h1>
    <a href="{{ route('kamar.create') }}" class="btn btn-primary mb-3">Tambah Kamar</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nomor Kamar</th>
                <th>Tipe Kamar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kamar as $k)
            <tr>
                <td>{{ $k->id }}</td>
                <td>{{ $k->nomor_kamar }}</td>
                <td>{{ $k->tipeKamar->nama }}</td>
                <td>{{ $k->status }}</td>
                <td>
                    <a href="{{ route('kamar.show', $k) }}" class="btn btn-sm btn-info">Detail</a>
                    <a href="{{ route('kamar.edit', $k) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('kamar.destroy', $k) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kamar ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection