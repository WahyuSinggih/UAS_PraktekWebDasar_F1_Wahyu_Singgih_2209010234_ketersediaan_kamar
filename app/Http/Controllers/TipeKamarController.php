<?php

namespace App\Http\Controllers;

use App\Models\TipeKamar;
use Illuminate\Http\Request;

class TipeKamarController extends Controller
{
    public function index()
    {
        $tipeKamar = TipeKamar::all();
        return view('tipe_kamar.index', compact('tipeKamar'));
    }

    public function create()
    {
        return view('tipe_kamar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
        ]);

        TipeKamar::create($request->all());
        return redirect()->route('tipe_kamar.index')->with('success', 'Tipe kamar berhasil ditambahkan.');
    }

    public function show(TipeKamar $tipeKamar)
    {
        return view('tipe_kamar.show', compact('tipeKamar'));
    }

    public function edit(TipeKamar $tipeKamar)
    {
        return view('tipe_kamar.edit', compact('tipeKamar'));
    }

    public function update(Request $request, TipeKamar $tipeKamar)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
        ]);

        $tipeKamar->update($request->all());
        return redirect()->route('tipe_kamar.index')->with('success', 'Tipe kamar berhasil diperbarui.');
    }

    public function destroy(TipeKamar $tipeKamar)
    {
        $tipeKamar->delete();
        return redirect()->route('tipe_kamar.index')->with('success', 'Tipe kamar berhasil dihapus.');
    }
}