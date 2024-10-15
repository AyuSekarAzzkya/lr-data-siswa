@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <h1>Daftar Akun</h1>

        <a href="{{ route('user.create') }}" class="btn btn-secondary mb-3 float-end">Tambah Pengguna</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif  

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                    <tr>
                        <td>{{ ($users->currentPage() - 1) * ($users->perPage()) + ($index + 1) }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Edit</a>

                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- ini adalah div untuk menyimpan link paginate --}}
        <div class="mt-3 float-end">
            {{ $users->links() }} 
        </div>  
    </div>
@endsection
