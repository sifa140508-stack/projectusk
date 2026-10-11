@extends('layouts.app')

@section('title', 'Data Skema Sertifikasi')

@section('content')

<div class="card">

    {{-- Header halaman --}}
    <div style="
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 25px;
    ">

        <div>
            <h1>Data Skema Sertifikasi</h1>

            <p style="margin-bottom: 0;">
                Daftar skema sertifikasi yang tersedia.
            </p>
        </div>

        <a href="{{ route('skema.create') }}"
           class="btn btn-primary">
            + Tambah Skema
        </a>

    </div>


    {{-- Tabel data --}}
    <div class="table-wrapper">

        <table class="table">

            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th>Kode Skema</th>
                    <th>Nama Skema</th>
                    <th>Deskripsi</th>
                    <th style="width: 170px;">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($skemas as $skema)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $skema->kode_skema }}
                        </td>

                        <td>
                            {{ $skema->nama_skema }}
                        </td>

                        <td>
                            {{ $skema->deskripsi ?? '-' }}
                        </td>

                        <td>

                            <div class="action-buttons">

                                {{-- Tombol Edit --}}
                                <a href="{{ route('skema.edit', $skema->id) }}"
                                   class="btn btn-warning">
                                    Edit
                                </a>


                                {{-- Tombol Hapus --}}
                                <form
                                    action="{{ route('skema.destroy', $skema->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?');"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger">
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5"
                            style="
                                text-align: center;
                                padding: 30px;
                                color: #6b7280;
                            ">

                            Belum ada data skema.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection