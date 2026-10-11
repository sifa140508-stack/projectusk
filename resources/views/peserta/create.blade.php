@extends('layouts.app')

@section('title', 'Tambah Peserta')

@section('content')

<div class="card">

    <h1>Tambah Peserta</h1>

    <p>
        Silakan masukkan data peserta sertifikasi.
    </p>

    <form action="{{ route('peserta.store') }}" method="POST">

        @csrf

        {{-- Nama --}}
        <div class="form-group">

            <label for="nama">
                Nama Peserta
            </label>

            <input
                type="text"
                id="nama"
                name="nama"
                class="form-control"
                value="{{ old('nama') }}"
                placeholder="Masukkan nama peserta"
                required
            >

            @error('nama')
                <small style="color: red;">
                    {{ $message }}
                </small>
            @enderror

        </div>


        {{-- Email --}}
        <div class="form-group">

            <label for="email">
                Email
            </label>

            <input
                type="email"
                id="email"
                name="email"
                class="form-control"
                value="{{ old('email') }}"
                placeholder="Contoh: nama@gmail.com"
                required
            >

            @error('email')
                <small style="color: red;">
                    {{ $message }}
                </small>
            @enderror

        </div>


        {{-- No HP --}}
        <div class="form-group">

            <label for="no_hp">
                No. HP
            </label>

            <input
                type="text"
                id="no_hp"
                name="no_hp"
                class="form-control"
                value="{{ old('no_hp') }}"
                placeholder="Contoh: 081234567890"
                required
            >

            @error('no_hp')
                <small style="color: red;">
                    {{ $message }}
                </small>
            @enderror

        </div>


        {{-- Asal Sekolah --}}
        <div class="form-group">

            <label for="asal_sekolah">
                Asal Sekolah
            </label>

            <input
                type="text"
                id="asal_sekolah"
                name="asal_sekolah"
                class="form-control"
                value="{{ old('asal_sekolah') }}"
                placeholder="Masukkan asal sekolah"
                required
            >

            @error('asal_sekolah')
                <small style="color: red;">
                    {{ $message }}
                </small>
            @enderror

        </div>


        {{-- Skema Sertifikasi --}}
        <div class="form-group">

            <label for="skema_sertifikasi_id">
                Skema Sertifikasi
            </label>

            <select
                id="skema_sertifikasi_id"
                name="skema_sertifikasi_id"
                class="form-control"
                required
            >

                <option value="">
                    -- Pilih Skema Sertifikasi --
                </option>

                @foreach ($skemas as $skema)

                    <option
                        value="{{ $skema->id }}"
                        {{ old('skema_sertifikasi_id') == $skema->id ? 'selected' : '' }}
                    >
                        {{ $skema->kode_skema }} -
                        {{ $skema->nama_skema }}
                    </option>

                @endforeach

            </select>

            @error('skema_sertifikasi_id')
                <small style="color: red;">
                    {{ $message }}
                </small>
            @enderror

        </div>


        {{-- Tombol --}}
        <div style="
            display: flex;
            gap: 10px;
            margin-top: 25px;
        ">

            <a href="{{ route('peserta.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

            <button type="submit"
                    class="btn btn-primary">
                Simpan Peserta
            </button>

        </div>

    </form>

</div>

@endsection