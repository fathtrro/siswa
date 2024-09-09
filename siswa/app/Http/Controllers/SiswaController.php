<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function guestIndex()
    {
        $siswas = Siswa::all();
        return view('welcome', compact('siswas'));
    }

    public function index()
    {
        $siswas = Siswa::with('schoolClass')->get();
        return view('siswas.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = SchoolClass::all();
        return view('siswas.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tanggal_lahir' => 'required|date',
            'school_class_id' => 'required|exists:school_classes,id',
        ]);

        $input = $request->all();

        if ($foto = $request->file('foto')) {
            $destinationPath = 'images/';
            $fotoSiswa = date('YmdHis') . "." . $foto->getClientOriginalExtension();
            $foto->move($destinationPath, $fotoSiswa);
            $input['foto'] = "$fotoSiswa";
        }

        $siswa = Siswa::create($input);
        $siswa->schoolClass()->associate($request->school_class_id); // Mengaitkan siswa dengan kelas
        $siswa->save();

        return redirect()->route('siswas.index')
            ->with('success', 'Siswa created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        $class = $siswa->schoolClass; // Ambil kelas yang terkait dengan siswa
        return view('siswas.show', compact('siswa', 'class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        $classes = SchoolClass::all();
        return view('siswas.edit', compact('siswa', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tanggal_lahir' => 'required|date',
            'school_class_id' => 'required|exists:school_classes,id' // Validasi kelas
        ]);

        $input = $request->all();

        if ($foto = $request->file('foto')) {
            $destinationPath = 'images/';
            $fotoSiswa = date('YmdHis') . "." . $foto->getClientOriginalExtension();
            $foto->move($destinationPath, $fotoSiswa);
            $input['foto'] = "$fotoSiswa";
        } else {
            unset($input['foto']);
        }

        $siswa->update($input);
        $siswa->schoolClass()->associate($request->school_class_id); // Mengaitkan siswa dengan kelas
        $siswa->save();

        return redirect()->route('siswas.index')
            ->with('success', 'Siswa updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {

        if (file_exists(public_path('images/' . $siswa->foto))) {
            unlink(public_path('images/' . $siswa->foto));
        }

        $siswa->delete();
        return redirect()->route('siswas.index')
            ->with('success', 'Siswa deleted successfully');
    }
}
