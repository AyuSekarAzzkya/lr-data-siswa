@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <a href="{{ route('datasiswa.create') }}" class="btn btn-secondary mb-3">Tambah Siswa</a>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIS</th>
                    <th>Rayon</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @php $no = ($siswa->currentPage() - 1)*$siswa->perPage() + 1; @endphp
                @foreach ($siswa as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->nama}}</td>
                        <td>{{ $item->nis}}</td>
                        <td>{{ $item->rayon }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('datasiswa.edit', $item->id) }}" class="btn btn-primary me-3">Edit</a>
                            <form action="{{ route('datasiswa.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $siswa->links() }} 
        </div>
    </div>
@endsection
