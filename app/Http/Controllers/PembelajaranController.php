<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\Materi;
use App\Models\Pembelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembelajaran = Pembelajaran::all();

        return view('adminpage.pembelajaran.index', compact('pembelajaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ar_kursus = Kursus::all();
        $ar_materi = Materi::all();

        return view('adminpage.pembelajaran.form', compact('ar_kursus', 'ar_materi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'kursus_id' => 'Required',
                'materi_id' => 'Required',
            ]
        );

        DB::table('pembelajaran')->insert(
            [
                'kursus_id' => $request->kursus_id,
                'materi_id' => $request->materi_id,
                'created_at' => now(),
            ]
        );

        return redirect()->route('pembelajaran.index')
            ->with('sucsess', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = Pembelajaran::find($id);

        return view('adminpage.pembelajaran.detail', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = Pembelajaran::find($id);
        $ar_kursus = Kursus::all();
        $ar_materi = Materi::all();

        return view('adminpage.pembelajaran.form_edit', compact('row', 'ar_kursus', 'ar_materi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'kursus_id' => 'Required',
                'materi_id' => 'Required',
            ]
        );

        DB::table('pembelajaran')->where('id', $id)->update(
            [
                'kursus_id' => $request->kursus_id,
                'materi_id' => $request->materi_id,
                'updated_at' => now(),
            ]
        );

        return redirect()->route('pembelajaran.index')
            ->with('sucsess', 'Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Pembelajaran::find($id);
        Pembelajaran::where('id', $id)->delete();

        return redirect()->route('pembelajaran.index')
            ->with('sucsess', 'Data Berhasil DiHapus');
    }
}
