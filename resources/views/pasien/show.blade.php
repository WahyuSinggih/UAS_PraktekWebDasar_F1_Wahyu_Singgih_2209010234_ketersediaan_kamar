@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Pasien</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $pasien->id }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $pasien->nama }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $pasien->alamat }}</td>
        </tr>
        <tr>
            <th>Nomor Telepon</th>
            <td>{{ $pasien->nomor_telepon }}</td>
        </tr>
    </table>
    <a href="{{ route('pasien.edit', $pasien) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection