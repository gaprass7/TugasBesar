<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KursusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kursus = Kursus::with('materi')->get();
        // dd($kursus->toArray());

        return view('adminpage.kursus.index', compact('kursus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminpage.kursus.form');
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
                'durasi' => 'Required',
                'foto' => 'Nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            ],
            [
                // Custom validasi (pesan error) berbahasa indonesia
                'judul.required' => 'Judul Wajib Diisi',
                'judul.max' => 'Judul Maxsimal 45 Karakter',
                'deskripsi.required' => 'Deskripsi Wajib Diisi',
                'durasi.required' => 'Durasi Kursus Wajib Diisi',
                'foto.image' => 'File Exstensi Foto Harus Berupa : jpg, jpeg, png, gif, svg',
                'foto.max' => 'Ukuran File Maksimal : 2048 '
            ]
        );

        //mengunakan mekanisme UseDB agar ada logic validasi data atau cara QueryBuilder
        //------------- Apakah User Ingin Upload Foto -------------------
        if (!empty($request->foto)) {
            $fileName = 'foto-' . $request->judul . '.' . $request->foto->extension();
            // $fileName = $request->foto->getClientOriginalName();

            $request->foto->move(public_path('admin/img'), $fileName);
        } else {
            $fileName = '';
        }

        //lakukan insert data dari request form
        DB::table('kursus')->insert(
            [
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'durasi' => $request->durasi,
                'foto' => $fileName,
                'created_at' => now(),
            ]
        );

        return redirect()->route('kursus.index')
            ->with('sucsess', 'Data Kursus Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = Kursus::find($id);

        return view('adminpage.kursus.detail', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = Kursus::find($id);

        return view('adminpage.kursus.form_edit', compact('row'));
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
                'durasi' => 'Required',
                'foto' => 'Nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            ],
            [
                // Custom validasi (pesan error) berbahasa indonesia
                'judul.required' => 'Judul Wajib Diisi',
                'judul.max' => 'Judul Maxsimal 45 Karakter',
                'deskripsi.required' => 'Deskripsi Wajib Diisi',
                'durasi.required' => 'Durasi Kursus Wajib Diisi',
                'foto.image' => 'File Exstensi Foto Harus Berupa : jpg, jpeg, png, gif, svg',
                'foto.max' => 'Ukuran File Maksimal : 2048 '
            ]
        );

        //mengunakan mekanisme UseDB agar ada logic validasi data atau cara QueryBuilder
        //mengunakan mekanisme UseDB agar ada logic validasi data atau cara QueryBuilder
        //------------- Apakah User Ingin Ganti Foto Lama -------------------
        $foto = DB::table('kursus')->select('foto')->where('id', $id)->get();
        //dilooping
        foreach ($foto as $f) {
            $namaFileFotoLama = $f->foto;
        }

        //------------- Apakah User Ingin Ganti Foto -------------------
        if (!empty($request->foto)) {
            //jika ada Foto Lama, hapus foto lama terlebih dahulu, lalu update foto baru

            if (!empty($row->foto)) unlink('admin/img' . $row->foto);
            //foto lama ganti foto baru
            $fileName = 'foto-' . $request->judul . '.' . $request->foto->extension();
            // $fileName = $request->foto->getClientOriginalName();   //jika ingin menggunakan name original di namafoto

            $request->foto->move(public_path('admin/img'), $fileName);
        }
        //user tidak ingin mengganti foto lama
        else {
            $fileName = $namaFileFotoLama;
        }

        //lakukan insert data dari request form
        DB::table('kursus')->where('id', $id)->update(
            [
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'durasi' => $request->durasi,
                'foto' => $fileName,
                'updated_at' => now()
            ]
        );

        return redirect()->back()
            ->with('sucsess', 'Data Kursus Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //sebelum hapus data nasabah, hapus terlebih dahulu softfile fotonya jika ada
        $row = Kursus::find($id);
        if (!empty($row->foto)) unlink('admin/img/' . $row->foto);
        //setelah itu baru hapus data nasabah nya
        Kursus::where('id', $id)->delete();
        return redirect()->route('kursus.index')
            ->with('sucsess', 'Data Kursus Berhasil DiHapus');
    }
}
