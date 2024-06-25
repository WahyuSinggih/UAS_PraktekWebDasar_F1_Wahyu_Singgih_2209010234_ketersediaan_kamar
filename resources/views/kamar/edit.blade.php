@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Kamar</h1>
    <form action="{{ route('kamar.update', $kamar) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nomor_kamar">Nomor Kamar</label>
            <input type="text" name="nomor_kamar" id="nomor_kamar" class="form-control" value="{{ $kamar->nomor_kamar }}" required>
        </div>
        <div class="form-group">
            <label for="tipe_kamar_id">Tipe Kamar</label>
            <select name="tipe_kamar_id" id="tipe_kamar_id" class="form-control" required>
                @foreach($tipeKamar as $tk)
                <option value="{{ $tk->id }}" {{ $kamar->tipe_kamar_id == $tk->id ? 'selected' : '' }}>{{ $tk->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="tersedia" {{ $kamar->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="tidak tersedia" {{ $kamar->status == 'tidak tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection