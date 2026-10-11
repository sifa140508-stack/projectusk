@extends('layouts.app')

@section('title', 'Tambah Skema Sertifikasi')

@section('content')

<div class="card">

    <h1>Tambah Skema Sertifikasi</h1>

    <p>Silakan masukkan data skema sertifikasi.</p>

    <form action="{{ route('skema.store') }}" method="POST">

        @csrf

        <div class="form-group">

            <label for="kode_skema">
                Kode Skema
            </label>

            <input
                type="text"
                id="kode_skema"
                name="kode_skema"
                class="form-control"
                value="{{ old('kode_skema') }}"
                placeholder="Contoh: JWD-001"
                required
            >

            @error('kode_skema')
                <small style="color: red;">
                    {{ $message }}
                </small>
            @enderror

        </div>

        <div class="form-group">

            <label for="nama_skema">
                Nama Skema
            </label>

            <input
                type="text"
                id="nama_skema"
                name="nama_skema"
                class="form-control"
                value="{{ old('nama_skema') }}"
                placeholder="Contoh: Junior Web Developer"
                required
            >

            @error('nama_skema')
                <small style="color: red;">
                    {{ $message }}
                </small>
            @enderror

        </div>

        <div class="form-group">

            <label for="deskripsi">
                Deskripsi
            </label>

            <textarea
                id="deskripsi"
                name="deskripsi"
                class="form-control"
                rows="5"
                placeholder="Masukkan deskripsi skema"
            >{{ old('deskripsi') }}</textarea>

            @error('deskripsi')
                <small style="color: red;">
                    {{ $message }}
                </small>
            @enderror

        </div>

        <a href="{{ route('skema.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

        <button type="submit"
                class="btn btn-primary">
            Simpan
        </button>

    </form>

</div>

@endsection