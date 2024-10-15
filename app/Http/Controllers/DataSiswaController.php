<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class DataSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::simplePaginate(6);
        return view ('datasiswa.index', compact('siswa'));
    }

    /** 
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('datasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' =>'required|min:3',
            'nis' => 'required|numeric',
            'rayon' =>'required|min:4',
        ]);

        Siswa::create([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'rayon' => $request->rayon,
        ]);
        
        return redirect()->route('datasiswa.index')->with('success', 'Berhasil menambahkan data siswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = Siswa::find($id);
        return view('datasiswa.edit', compact('siswa'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' =>'required|min:3',
            'nis' => 'required|numeric',
            'rayon' =>'required|min:4',
        ]);

        Siswa::where('id', $id)->update([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'rayon' => $request->rayon,
        ]);
        return redirect()->route('datasiswa.index')->with('success', 'Berhasil Mengedit data siswa');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data siswa!');
    }
    
}
