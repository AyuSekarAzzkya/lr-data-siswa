@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-dark mb-4">Dashboard Admin</h1>
    <div class="card bg-light">
        <div class="card-header bg-dark text-white">
            <h5>Selamat Datang, Admin!</h5>
        </div>
        <div class="card-body">
            <p class="card-text text-dark">Ini adalah halaman dashboard Anda. Anda dapat mengelola data siswa dan melakukan administrasi lainnya dari sini.</p>
            <a href="{{ route('datasiswa.index') }}" class="btn btn-secondary">Lihat Data Siswa</a>
        </div>
    </div>
</div>
@endsection
