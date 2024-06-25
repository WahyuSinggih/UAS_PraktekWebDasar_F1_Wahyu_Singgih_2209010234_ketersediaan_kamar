@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Tipe Kamar</h1>
    <a href="{{ route('tipe_kamar.create') }}" class="btn btn-primary mb-3">Tambah Tipe Kamar</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tipeKamar as $tk)
            <tr>
                <td>{{ $tk->id }}</td>
                <td>{{ $tk->nama }}</td>
                <td>{{ $tk->harga }}</td>
                <td>
                    <a href="{{ route('tipe_kamar.show', $tk) }}" class="btn btn-sm btn-info">Detail</a>
                    <a href="{{ route('tipe_kamar.edit', $tk) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('tipe_kamar.destroy', $tk) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus tipe kamar ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection