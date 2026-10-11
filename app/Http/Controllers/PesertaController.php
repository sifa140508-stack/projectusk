<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\SkemaSertifikasi;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index(Request $request)
{
    $query = Peserta::with('skemaSertifikasi');

    if ($request->filled('search')) {
        $query->where('nama', 'like', '%' . $request->search . '%');
    }

    $pesertas = $query->latest()->get();

    return view('peserta.index', compact('pesertas'));
}
    public function create()
    {
        $skemas = SkemaSertifikasi::all();

        return view('peserta.create', compact('skemas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'asal_sekolah' => 'required',
            'skema_sertifikasi_id' => 'required|exists:skema_sertifikasis,id',
        ]);

        Peserta::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'asal_sekolah' => $request->asal_sekolah,
            'skema_sertifikasi_id' => $request->skema_sertifikasi_id,
        ]);

        return redirect()
            ->route('peserta.index')
            ->with('success', 'Data peserta berhasil ditambahkan.');
    }

    public function show(Peserta $peserta)
{
    $peserta->load('skemaSertifikasi');

    return view('peserta.show', compact('peserta'));
}

    public function edit(Peserta $peserta)
    {
        $skemas = SkemaSertifikasi::all();

        return view('peserta.edit', compact('peserta', 'skemas'));
    }

    public function update(Request $request, Peserta $peserta)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'asal_sekolah' => 'required',
            'skema_sertifikasi_id' => 'required|exists:skema_sertifikasis,id',
        ]);

        $peserta->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'asal_sekolah' => $request->asal_sekolah,
            'skema_sertifikasi_id' => $request->skema_sertifikasi_id,
        ]);

        return redirect()
            ->route('peserta.index')
            ->with('success', 'Data peserta berhasil diubah.');
    }

    public function destroy(Peserta $peserta)
    {
        $peserta->delete();

        return redirect()
            ->route('peserta.index')
            ->with('success', 'Data peserta berhasil dihapus.');
    }
}