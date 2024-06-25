@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Kamar</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $kamar->id }}</td>
        </tr>
        <tr>
            <th>Nomor Kamar</th>
            <td>{{ $kamar->nomor_kamar }}</td>
        </tr>
        <tr>
            <th>Tipe Kamar</th>
            <td>{{ $kamar->tipeKamar->nama }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $kamar->status }}</td>
        </tr>
    </table>
    <a href="{{ route('kamar.edit', $kamar) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('kamar.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection