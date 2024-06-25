<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\TipeKamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index()
    {
        $kamar = Kamar::with('tipeKamar')->get();
        return view('kamar.index', compact('kamar'));
    }

    public function create()
    {
        $tipeKamar = TipeKamar::all();
        return view('kamar.create', compact('tipeKamar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_kamar' => 'required|unique:kamar',
            'tipe_kamar_id' => 'required|exists:tipe_kamar,id',
            'status' => 'required|in:tersedia,tidak tersedia',
        ]);

        Kamar::create($request->all());
        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil ditambahkan.');
    }

    public function show(Kamar $kamar)
    {
        return view('kamar.show', compact('kamar'));
    }

    public function edit(Kamar $kamar)
    {
        $tipeKamar = TipeKamar::all();
        return view('kamar.edit', compact('kamar', 'tipeKamar'));
    }

    public function update(Request $request, Kamar $kamar)
    {
        $request->validate([
            'nomor_kamar' => 'required|unique:kamar,nomor_kamar,' . $kamar->id,
            'tipe_kamar_id' => 'required|exists:tipe_kamar,id',
            'status' => 'required|in:tersedia,tidak tersedia',
        ]);

        $kamar->update($request->all());

        return redirect()->route('kamar.index')
            ->with('success', 'Kamar berhasil diperbarui.');
    }


    public function destroy(Kamar $kamar)
    {
        $kamar->delete();
        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil dihapus.');
    }
}