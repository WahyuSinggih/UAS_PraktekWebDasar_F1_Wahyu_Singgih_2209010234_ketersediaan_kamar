<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Kamar;
use App\Models\Pasien;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        $reservasi = Reservasi::with(['kamar', 'pasien'])->get();
        return view('reservasi.index', compact('reservasi'));
    }

    public function create()
    {
        $kamar = Kamar::where('status', 'tersedia')->get();
        $pasien = Pasien::all();
        return view('reservasi.create', compact('kamar', 'pasien'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kamar_id' => 'required|exists:kamar,id',
            'pasien_id' => 'required|exists:pasien,id',
            'tanggal_check_in' => 'required|date',
        ]);

        $reservasi = Reservasi::create($request->all());

        // Update status kamar
        $kamar = Kamar::find($request->kamar_id);
        $kamar->status = 'tidak tersedia';
        $kamar->save();

        return redirect()->route('reservasi.index')
            ->with('success', 'Reservasi berhasil ditambahkan.');
    }

    public function show(Reservasi $reservasi)
    {
        return view('reservasi.show', compact('reservasi'));
    }

    public function edit(Reservasi $reservasi)
    {
        $kamar = Kamar::all();
        $pasien = Pasien::all();
        return view('reservasi.edit', compact('reservasi', 'kamar', 'pasien'));
    }

    public function update(Request $request, Reservasi $reservasi)
    {
        $request->validate([
            'kamar_id' => 'required|exists:kamar,id',
            'pasien_id' => 'required|exists:pasien,id',
            'tanggal_check_in' => 'required|date',
            'tanggal_check_out' => 'nullable|date',
            'status' => 'required|in:aktif,selesai',
        ]);

        $reservasi->update($request->all());

        // Update status kamar jika reservasi selesai
        if ($request->status == 'selesai') {
            $kamar = Kamar::find($request->kamar_id);
            $kamar->status = 'tersedia';
            $kamar->save();
        }

        return redirect()->route('reservasi.index')
            ->with('success', 'Reservasi berhasil diperbarui.');
    }

    public function destroy(Reservasi $reservasi)
    {
        $reservasi->delete();

        // Update status kamar menjadi tersedia
        $kamar = $reservasi->kamar;
        $kamar->status = 'tersedia';
        $kamar->save();

        return redirect()->route('reservasi.index')
            ->with('success', 'Reservasi berhasil dihapus.');
    }

    public function checkOut(Reservasi $reservasi)
    {
        $reservasi->status = 'selesai';
        $reservasi->tanggal_check_out = now();
        $reservasi->save();

        // Update status kamar menjadi tersedia
        $kamar = $reservasi->kamar;
        $kamar->status = 'tersedia';
        $kamar->save();

        return redirect()->route('reservasi.index')
            ->with('success', 'Check-out berhasil.');
    }
}