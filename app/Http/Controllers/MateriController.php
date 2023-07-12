<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materi = Materi::all();

        return view('adminpage.materi.index', compact('materi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminpage.materi.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // proses input data kursus
        $request->validate(
            [
                'judul' => 'Required|max:45',
                'deskripsi' => 'Required',
                'link_embed' => 'Required',
            ],
            [
                // Custom validasi (pesan error) berbahasa indonesia
                'judul.required' => 'Judul Wajib Diisi',
                'judul.max' => 'Judul Maxsimal 45 Karakter',
                'deskripsi.required' => 'Deskripsi Wajib Diisi',
                'link_embed.required' => 'Link Wajib Diisi',
            ]
        );

        //lakukan insert data dari request form
        DB::table('materi')->insert(
            [
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'link_embed' => $request->link_embed,
                'created_at' => now(),
            ]
        );

        return redirect()->route('materi.index')
            ->with('sucsess', 'Data Materi Baru Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = Materi::find($id);

        return view('adminpage.materi.detail', compact('row'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = Materi::find($id);
    
        return view('adminpage.materi.form_edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'judul' => 'Required|max:45',
                'deskripsi' => 'Required',
                'link_embed' => 'Required',
            ],
            [
                // Custom validasi (pesan error) berbahasa indonesia
                'judul.required' => 'Judul Wajib Diisi',
                'judul.max' => 'Judul Maxsimal 45 Karakter',
                'deskripsi.required' => 'Deskripsi Wajib Diisi',
                'link_embed.required' => 'Link Wajib Diisi',
            ]
        );

        //lakukan insert data dari request form
        DB::table('materi')->where('id', $id)->update(
            [
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'link_embed' => $request->link_embed,
                'updated_at' => now(),
            ]
        );

        return redirect()->route('materi.index')
            ->with('sucsess', 'Data Materi Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Materi::find($id);
        Materi::where('id', $id)->delete();

        return redirect()->route('materi.index')
            ->with('sucsess', 'Data Materi Berhasil DiHapus');
    }
}
