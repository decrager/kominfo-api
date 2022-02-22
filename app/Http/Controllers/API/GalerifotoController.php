<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Galerifoto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();

        if ($user->role == 'admin') {
            $request->validate([
                'album_id' => 'required|max:11',
                'judul' => 'required|max:100',
                'foto' => 'required|mimes:jpeg,jpg,png|max:5000',
                'keterangan' => 'required|max:100'
            ]);

            $foto = new Galerifoto;
            $foto->album_id = $request->album_id;
            $foto->judul = $request->judul;
            $foto->foto = $request->file('foto')->store('images');
            $foto->keterangan = $request->keterangan;
            $foto->save();

            return response()->json([
                'message' => "Data Galerifoto Added Successfully",
                'Added Galerifoto' => $foto
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function update(Request $request, $id)
    {
        $foto = Galerifoto::find($id);
        $user = Auth::user();

        if ($user->role == 'admin') {
            $request->validate([
                'album_id' => 'required|max:11',
                'judul' => 'required|max:100',
                'foto' => 'required|mimes:jpeg,jpg,png|max:5000',
                'keterangan' => 'required|max:100'
            ]);

            $foto->update([
                'album_id' => $request->album_id,
                'judul' => $request->judul,
                'foto' => $request->file('foto')->store('images'),
                'keterangan' => $request->keterangan
            ]);

            return response()->json([
                'message' => "Data Galerifoto Updated Successfully!",
                'Updated Galerifoto' => $foto
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
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
        $foto = Galerifoto::with('Album')
        ->select(
            'id',
            'album_id',
            'judul',
            'foto',
            'keterangan'
        )->get();

        return response()->json([
            'message' => "Data Galerifoto with Album Loaded Successfully!",
            'Galerifoto' => $foto
        ], Response::HTTP_OK);
    }

    public function galerifotoById($id)
    {
        $foto = Galerifoto::with('Album')
        ->select(
            'id',
            'album_id',
            'judul',
            'foto',
            'keterangan'
        )
        ->where('id', $id)
        ->get();

        return response()->json([
            'message' => "Data Galerifoto with Album Loaded Successfully!",
            'Galerifoto' => $foto
        ], Response::HTTP_OK);
    }
}
