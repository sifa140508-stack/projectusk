@extends('layouts.app')

@section('title', 'Detail Peserta')

@section('content')

<div class="card">

    <div style="
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    ">

        <div>
            <h1>Detail Peserta</h1>

            <p>
                Informasi lengkap peserta sertifikasi.
            </p>
        </div>

        <a href="{{ route('peserta.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </div>


    <div style="
        display: grid;
        grid-template-columns: 180px 1fr;
        gap: 15px;
        font-size: 14px;
    ">

        <strong>Nama Peserta</strong>
        <span>{{ $peserta->nama }}</span>

        <strong>Email</strong>
        <span>{{ $peserta->email }}</span>

        <strong>No. HP</strong>
        <span>{{ $peserta->no_hp }}</span>

        <strong>Asal Sekolah</strong>
        <span>{{ $peserta->asal_sekolah }}</span>

        <strong>Skema Sertifikasi</strong>
        <span>
            {{ $peserta->skemaSertifikasi->nama_skema ?? '-' }}
        </span>

    </div>

</div>

@endsection