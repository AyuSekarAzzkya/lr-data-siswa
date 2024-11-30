<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data absensi
        $absensis = Absensi::all();
        
        // Mengirimkan data absensi ke view index
        return view('absensi.index', compact('absensis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk menambahkan data absensi
        return view('absensi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'name' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required|in:hadir,sakit,izin,tidak ada keterangan,dispen',
        ]);

        // Menyimpan data absensi ke dalam database
        Absensi::create([
            'nama' => $request->name, // Nama dari input form
            'tanggal' => $request->tanggal, // Tanggal dari input form
            'status' => $request->status, // Status dari input form
        ]);

        // Redirect ke halaman absensi.index dengan pesan sukses
        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Menampilkan absensi berdasarkan ID
        $absensi = Absensi::findOrFail($id);
        
        // Mengirim data absensi ke view show
        return view('absensi.show', compact('absensi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Mencari data absensi berdasarkan ID
        $absensi = Absensi::findOrFail($id);

        // Menampilkan form edit dengan membawa data absensi
        return view('absensi.edit', compact('absensi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required|in:hadir,sakit,izin,tidak ada keterangan,dispen',
        ]);

        // Mencari data absensi berdasarkan ID
        $absensi = Absensi::findOrFail($id);

        // Memperbarui data absensi
        $absensi->update([
            'nama' => $request->name,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
        ]);

        // Redirect ke halaman absensi.index dengan pesan sukses
        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Mencari data absensi berdasarkan ID
        $absensi = Absensi::findOrFail($id);

        // Menghapus data absensi
        $absensi->delete();

        // Redirect ke halaman absensi.index dengan pesan sukses
        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil dihapus!');
    }
}
