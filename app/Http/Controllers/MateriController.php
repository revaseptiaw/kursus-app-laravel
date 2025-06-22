<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Materi;
use App\Models\Kursus;

class MateriController extends Controller
{
    public function index()
    {
        $materis = Materi::with('kursus')->latest()->paginate(10);
        return view('materi.index', compact('materis'));
    }

    public function materiByKursus(Kursus $kursus)
    {
        $materis = $kursus->materi()->latest()->paginate(10);
        return view('materi.kursus', compact('kursus', 'materis'));
    }

    public function create(Kursus $kursus)
    {
        return view('materi.create', compact('kursus'));
    }

    public function store(Request $request, Kursus $kursus)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $kursus->materi()->create($request->only('judul', 'deskripsi'));

        return redirect()->route('kursus.materi', $kursus)->with('message', 'Materi berhasil ditambahkan.');
    }

    public function destroy($id)
{
    $materi = Materi::findOrFail($id);
    $materi->delete();

    return redirect()->route('materi.index')->with('success', 'Materi berhasil dihapus.');
}

}


