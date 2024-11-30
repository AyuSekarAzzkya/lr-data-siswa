@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Edit Absensi</h2>

        <form action="{{ route('absensi.update', $absensi->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Metode PUT untuk update -->

            @if ($errors->any())
                <ul class="alert alert-danger p-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            @if (session('failed'))
                <div class="alert alert-danger">{{ session('failed') }}</div>
            @endif

            <!-- Nama -->
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $absensi->nama) }}" required>
                </div>
            </div>

            <!-- Tanggal -->
            <div class="mb-3 row">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal', $absensi->tanggal) }}" required>
                </div>
            </div>

            <!-- Status -->
            <div class="mb-3 row">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select name="status" id="status" class="form-select" required>
                        <option value="hadir" {{ $absensi->status == 'hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="sakit" {{ $absensi->status == 'sakit' ? 'selected' : '' }}>Sakit</option>
                        <option value="izin" {{ $absensi->status == 'izin' ? 'selected' : '' }}>Izin</option>
                        <option value="tidak ada keterangan" {{ $absensi->status == 'tidak ada keterangan' ? 'selected' : '' }}>Tidak Ada Keterangan</option>
                        <option value="dispen" {{ $absensi->status == 'dispen' ? 'selected' : '' }}>Dispen</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
