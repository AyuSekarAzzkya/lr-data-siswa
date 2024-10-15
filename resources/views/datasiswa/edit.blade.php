@extends('layouts.app')
@section('content')
<div class="container mt-2">
    <h2 class="mb-4">Edit Data Siswa</h2>
    <form action="{{ route('datasiswa.update', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT') 
        
        <div class="form-group row mb-3">
            <label for="nama" class="col-sm-2 col-form-label"><b>Nama Siswa</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $siswa->nama) }}" required>
            </div>
        </div>
        
        <div class="form-group row mb-3">
            <label for="nis" class="col-sm-2 col-form-label"><b>NIS</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nis" name="nis" value="{{ old('nis', $siswa->nis) }}" maxlength="8" required>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="rayon" class="col-sm-2 col-form-label"><b>Rayon</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="rayon" name="rayon" value="{{ old('rayon', $siswa->rayon) }}" required>
            </div>
        </div>

        <div class="form-group row mb-3">
            <div class="col-sm-12 offset">
                <button type="submit" class="btn btn-primary w-100 mb-2">Simpan</button> 
                <a href="{{ route('datasiswa.index') }}" class="btn btn-danger w-100">Kembali</a> 
            </div>
        </div>
    </form>
</div>
@endsection
