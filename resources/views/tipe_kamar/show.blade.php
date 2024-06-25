@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Tipe Kamar</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $tipeKamar->id }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $tipeKamar->nama }}</td>
        </tr>
        <tr>
            <th>Harga</th>
            <td>{{ $tipeKamar->harga }}</td>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <td>{{ $tipeKamar->deskripsi }}</td>
        </tr>
    </table>
    <a href="{{ route('tipe_kamar.edit', $tipeKamar) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('tipe_kamar.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection