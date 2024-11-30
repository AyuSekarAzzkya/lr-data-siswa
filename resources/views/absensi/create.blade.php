@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <form action="{{ route('absensi.store') }}" method="POST" class="card m-auto p-5">
            @csrf

            <!-- Menampilkan Pesan Error jika Ada -->
            @if ($errors->any())
                <ul class="alert alert-danger p-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <!-- Menampilkan Pesan Gagal jika Ada -->
            @if (session('failed'))
                <div class="alert alert-danger">{{ session('failed') }}</div>
            @endif

            <!-- Input untuk Nama -->
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
            </div>

            <!-- Input untuk Tanggal -->
            <div class="mb-3 row">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                </div>
            </div>

            <!-- Dropdown untuk Status -->
            <div class="mb-3 row">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select name="status" id="status" class="form-select" required>
                        <option selected hidden disabled>Pilih Status</option>
                        <option value="hadir">Hadir</option>
                        <option value="sakit">Sakit</option>
                        <option value="izin">Izin</option>
                        <option value="tidak ada keterangan">Tidak Ada Keterangan</option>
                        <option value="dispen">Dispen</option>
                    </select>
                </div>
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
