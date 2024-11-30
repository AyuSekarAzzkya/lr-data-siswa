@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <a href="{{ route('absensi.create') }}" class="btn btn-primary mb-3">Input Absen</a>
        
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($absensis as $index => $absensi)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $absensi->nama }}</td>
                        <td>{{ \Carbon\Carbon::parse($absensi->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $absensi->status }}</td>
                        <td class="d-flex justify-content-center">
                            <!-- Edit Button -->
                            <a href="{{ route('absensi.edit', $absensi->id) }}" class="btn btn-primary mr-2">Edit</a>
                            
                            <!-- Delete Form -->
                            <form action="{{ route('absensi.destroy', $absensi->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
