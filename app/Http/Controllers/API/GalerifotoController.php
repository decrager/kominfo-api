<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Galerifoto;
use Illuminate\Support\Facades\DB;

class GalerifotoController extends Controller
{
    public function view()
    {
        $foto = Galerifoto::orderBy('id', 'ASC')->get();
        return response()->json([
            'message' => "Data Galerifoto Loaded Successfully!",
            'Galerifoto' => $foto
        ], Response::HTTP_OK);
    }

    public function viewById($id)
    {
        $foto = Galerifoto::find($id);
        return response()->json([
            'message' => "Data Galerifoto Loaded Successfully!",
            'Galerifoto' => $foto
        ], Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $request->validate([
            'album_id' => 'required',
            'judul' => 'required',
            'foto' => 'required',
            'keterangan' => 'required'
        ]);

        $foto = new Galerifoto;
        $foto->album_id = $request->album_id;
        $foto->judul = $request->judul;
        $foto->foto = $request->foto;
        $foto->keterangan = $request->keterangan;
        $foto->save();

        return response()->json([
            'message' => "Data Galerifoto Added Successfully",
            'Added Galerifoto' => $foto
        ], Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $foto = Galerifoto::find($id);

        $request->validate([
            'album_id' => 'required',
            'judul' => 'required',
            'foto' => 'required',
            'keterangan' => 'required'
        ]);

        $foto->update([
            'album_id' => $request->album_id,
            'judul' => $request->judul,
            'foto' => $request->foto,
            'keterangan' => $request->keterangan
        ]);

        return response()->json([
            'message' => "Data Galerifoto Updated Successfully!",
            'Updated Galerifoto' => $foto
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $foto = Galerifoto::find($id)->delete();
        return response()->json([
            'message' => "Data Galerifoto Deleted Successfully!"
        ], Response::HTTP_OK);
    }

    public function galerifoto()
    {
        $foto = DB::table('galerifotos')
            ->join('albums', 'galerifotos.album_id', '=', 'albums.id')
            ->select('galerifotos.id', 'albums.judul', 'galerifotos.foto', 'galerifotos.keterangan')
            ->get();

        return response()->json([
            'message' => "Data Galerifoto Loaded Successfully!",
            'Galerifoto' => $foto
        ], Response::HTTP_OK);
    }

    public function galerifotoById($id)
    {
        $foto = DB::table('galerifotos')
            ->join('albums', 'galerifotos.album_id', '=', 'albums.id')
            ->select('albums.judul', 'galerifotos.foto', 'galerifotos.keterangan')
            ->where('galerifotos.id', $id)
            ->get();

        return response()->json([
            'message' => "Data Galerifoto Loaded Successfully!",
            'Galerifoto' => $foto
        ], Response::HTTP_OK);
    }
}
