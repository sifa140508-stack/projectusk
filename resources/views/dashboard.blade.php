@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="card">

        <h1>Dashboard</h1>

        <p>
            Selamat datang di Aplikasi Pengelolaan Data Peserta Sertifikasi.
        </p>

    </div>

    <div style="
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    ">

        {{-- CARD PESERTA --}}
        <div class="card">

    <h3>Jumlah Peserta</h3>

    <h1>
        {{ $jumlahPeserta }}
    </h1>

    <a href="/peserta"
       class="btn btn-primary">
        Data Peserta
    </a>

</div>


        {{-- CARD SKEMA --}}
        <div class="card">

            <h3>Jumlah Skema</h3>

            <h1>
                {{ $jumlahSkema }}
            </h1>

            <a href="{{ route('skema.index') }}"
               class="btn btn-primary">
                Data Skema
            </a>

        </div>

    </div>

@endsection