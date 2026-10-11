<?php

namespace App\Http\Controllers;

use App\Models\SkemaSertifikasi;
use Illuminate\Http\Request;

class SkemaSertifikasiController extends Controller
{
    public function index()
    {
        $skemas = SkemaSertifikasi::all();

        return view('skema.index', compact('skemas'));
    }

    public function create()
    {
        return view('skema.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_skema' => 'required|unique:skema_sertifikasis,kode_skema',
            'nama_skema' => 'required',
            'deskripsi' => 'nullable',
        ]);

        SkemaSertifikasi::create([
            'kode_skema' => $request->kode_skema,
            'nama_skema' => $request->nama_skema,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('skema.index')
            ->with('success', 'Data skema berhasil ditambahkan.');
    }

    public function edit(SkemaSertifikasi $skema)
    {
        return view('skema.edit', compact('skema'));
    }

    public function update(Request $request, SkemaSertifikasi $skema)
    {
        $request->validate([
            'kode_skema' => 'required|unique:skema_sertifikasis,kode_skema,' . $skema->id,
            'nama_skema' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $skema->update([
            'kode_skema' => $request->kode_skema,
            'nama_skema' => $request->nama_skema,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('skema.index')
            ->with('success', 'Data skema berhasil diubah.');
    }

    public function destroy(SkemaSertifikasi $skema)
    {
        $skema->delete();

        return redirect()
            ->route('skema.index')
            ->with('success', 'Data skema berhasil dihapus.');
    }
}