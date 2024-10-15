@extends('layouts.app')
@section('content')
    <div class="container mt-2">
        <h2 class="mb-4">Tambah Data Siswa</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('datasiswa.store') }}" method="POST">
            @csrf

            <div class="form-group row mb-3">
                <label for="nama" class="col-sm-2 col-form-label"><b>Nama Siswa</b></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="nis" class="col-sm-2 col-form-label"><b>NIS</b></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nis" name="nis" maxlength="8" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="rayon" class="col-sm-2 col-form-label"><b>Rayon</b></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="rayon" name="rayon" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                <div class="col-sm-12 offset"> <!-- Menggunakan offset untuk menyesuaikan posisi -->
                    <button type="submit" class="btn btn-primary w-100 mb-2">Simpan</button> <!-- Tombol panjang -->
                    <a href="{{ route('datasiswa.index') }}" class="btn btn-danger w-100">Kembali</a>
                    <!-- Tombol panjang -->
                </div>
        </form>
    </div>
@endsection
