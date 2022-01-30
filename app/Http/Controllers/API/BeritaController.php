<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{
    public function view()
    {
        $berita = Berita::orderBy('id', 'ASC')->get();
        return response()->json([
            'message' => "Data Berita Loaded Successfully!",
            'Berita' => $berita
        ], Response::HTTP_OK);
    }

    public function viewById($id)
    {
        $berita = Berita::find($id);
        return response()->json([
            'message' => "Data Berita Loaded Successfully!",
            'Berita' => $berita
        ], Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'kategori_id' => 'required',
            'isi' => 'required',
            'gambar' => 'required',
            'tgl' => 'required',
            'status' => 'required',
            'user_id' => 'required'
        ]);

        $berita = new Berita;
        $berita->judul = $request->judul;
        $berita->kategori_id = $request->kategori_id;
        $berita->isi = $request->isi;
        $berita->gambar = $request->gambar;
        $berita->tgl = $request->tgl;
        $berita->status = $request->status;
        $berita->user_id = $request->user_id;
        $berita->save();

        return response()->json([
            'message' => "Data Berita Added Successfully!",
            'Added Berita' => $berita
        ], Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::find($id);

        $request->validate([
            'judul' => 'required',
            'kategori_id' => 'required',
            'isi' => 'required',
            'gambar' => 'required',
            'tgl' => 'required',
            'status' => 'required',
            'user_id' => 'required'
        ]);

        $berita->update([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'isi' => $request->isi,
            'gambar' => $request->gambar,
            'tgl' => $request->tgl,
            'status' => $request->status,
            'user_id' => $request->user_id
        ]);

        return response()->json([
            'message' => "Data Berita Updated Successfully!",
            'Updated Berita' => $berita
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $berita = Berita::find($id)->delete();
        return response()->json([
            'message' => "Data Berita Deleted Successfully!"
        ], Response::HTTP_OK);
    }

    public function berita()
    {
        $berita = DB::table('beritas')
            ->join('kat_beritas', 'beritas.kategori_id', '=', 'kat_beritas.id')
            ->join('penggunas', 'beritas.user_id', '=', 'penggunas.id')
            ->select('beritas.id', 'beritas.judul', 'kat_beritas.kategori', 'beritas.isi', 'beritas.gambar', 'beritas.tgl', 'beritas.status', 'penggunas.username')
            ->get();

        return response()->json([
            'message' => "Data Berita Loaded Successfully!",
            'Berita' => $berita
        ], Response::HTTP_OK);
    }

    public function beritaById($id)
    {
        $berita = DB::table('beritas')
            ->join('kat_beritas', 'beritas.kategori_id', '=', 'kat_beritas.id')
            ->join('penggunas', 'beritas.user_id', '=', 'penggunas.id')
            ->select('beritas.judul', 'kat_beritas.kategori', 'beritas.isi', 'beritas.gambar', 'beritas.tgl', 'beritas.status', 'penggunas.username')
            ->where('beritas.id', $id)
            ->get();

        return response()->json([
            'message' => "Data Berita Loaded Successfully!",
            'Berita' => $berita
        ], Response::HTTP_OK);
    }
}