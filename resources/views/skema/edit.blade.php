@extends('layouts.app')

@section('title', 'Edit Skema Sertifikasi')

@section('content')

<div class="card">

    <h1>Edit Skema Sertifikasi</h1>

    <p>Ubah data skema sertifikasi.</p>

    <form
        action="{{ route('skema.update', $skema->id) }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <div class="form-group">

            <label for="kode_skema">
                Kode Skema
            </label>

            <input
                type="text"
                id="kode_skema"
                name="kode_skema"
                class="form-control"
                value="{{ old('kode_skema', $skema->kode_skema) }}"
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
                value="{{ old('nama_skema', $skema->nama_skema) }}"
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
            >{{ old('deskripsi', $skema->deskripsi) }}</textarea>

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
                class="btn btn-warning">
            Simpan Perubahan
        </button>

    </form>

</div>

@endsection