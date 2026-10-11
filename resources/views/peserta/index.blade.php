@extends('layouts.app')

@section('title', 'Data Peserta')

@section('content')

<div class="card">

    {{-- Header halaman --}}
    <div style="
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 20px;
    ">

        <div>
            <h1>Data Peserta</h1>

            <p style="margin-bottom: 0;">
                Daftar peserta sertifikasi yang terdaftar.
            </p>
        </div>

        <a href="{{ route('peserta.create') }}"
           class="btn btn-primary">
            + Tambah Peserta
        </a>

    </div>


    {{-- Pencarian --}}
    <form action="{{ route('peserta.index') }}"
          method="GET"
          style="
              display: flex;
              gap: 10px;
              margin-bottom: 25px;
          ">

        <input
            type="text"
            name="search"
            class="form-control"
            value="{{ request('search') }}"
            placeholder="Cari nama peserta..."
        >

        <button type="submit"
                class="btn btn-primary">
            Cari
        </button>

        @if(request('search'))

            <a href="{{ route('peserta.index') }}"
               class="btn btn-secondary">
                Reset
            </a>

        @endif

    </form>


    {{-- Tabel data --}}
    <div class="table-wrapper">

        <table class="table">

            <thead>

                <tr>
                    <th style="width: 60px;">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No. HP</th>
                    <th>Asal Sekolah</th>
                    <th>Skema Sertifikasi</th>
                    <th style="width: 220px;">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse ($pesertas as $peserta)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td style="white-space: nowrap;">
                            {{ $peserta->nama }}
                        </td>

                        <td>
                            {{ $peserta->email }}
                        </td>

                        <td>
                            {{ $peserta->no_hp }}
                        </td>

                        <td style="white-space: nowrap;">
                            {{ $peserta->asal_sekolah }}
                        </td>

                        <td>
                            {{ $peserta->skemaSertifikasi->nama_skema ?? '-' }}
                        </td>

                        <td>

                            <div class="action-buttons">

                                {{-- Detail --}}
                                <a href="{{ route('peserta.show', $peserta->id) }}"
                                   class="btn btn-primary">
                                    Detail
                                </a>


                                {{-- Edit --}}
                                <a href="{{ route('peserta.edit', $peserta->id) }}"
                                   class="btn btn-warning">
                                    Edit
                                </a>


                                {{-- Hapus --}}
                                <form
                                    action="{{ route('peserta.destroy', $peserta->id) }}"
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

                        <td colspan="7"
                            style="
                                text-align: center;
                                padding: 30px;
                                color: #6b7280;
                            ">

                            @if(request('search'))

                                Data peserta dengan nama
                                <strong>"{{ request('search') }}"</strong>
                                tidak ditemukan.

                            @else

                                Belum ada data peserta.

                            @endif

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection