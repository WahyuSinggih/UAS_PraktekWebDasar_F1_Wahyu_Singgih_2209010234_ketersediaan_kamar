@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Kamar</h1>
    <form action="{{ route('kamar.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nomor_kamar">Nomor Kamar</label>
            <input type="text" name="nomor_kamar" id="nomor_kamar" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tipe_kamar_id">Tipe Kamar</label>
            <select name="tipe_kamar_id" id="tipe_kamar_id" class="form-control" required>
                @foreach($tipeKamar as $tk)
                <option value="{{ $tk->id }}">{{ $tk->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="tersedia">Tersedia</option>
                <option value="tidak tersedia">Tidak Tersedia</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection