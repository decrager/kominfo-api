<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Kat_berita;

class KatBeritaController extends Controller
{
    public function view()
    {
        $katBerita = Kat_berita::orderBy('id', 'ASC')->get();
        return response()->json([
            'message' => "Data Kategori Berita Loaded Successfully!",
            'Kategori Berita' => $katBerita
        ], Response::HTTP_OK);
    }

    public function viewById($id)
    {
        $katBerita = Kat_berita::find($id);
        return response()->json([
            'message' => "Data Kategori Berita Loaded Successfully!",
            'Kategori Berita' => $katBerita
        ], Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $request->validate([
            'kategori' => 'required|max:50',
            'keterangan' => 'required|max:50'
        ]);

        $user = Auth::user();

        if ($user->role == 'admin') {
            $katBerita = new Kat_berita;
            $katBerita->kategori = $request->kategori;
            $katBerita->keterangan = $request->keterangan;
            $katBerita->save();

            return response()->json([
                'message' => "Data Kategori Berita Added Successfully!",
                'Kategori Berita Baru' => $katBerita
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function update(Request $request, $id)
    {
        $katBerita = Kat_berita::find($id);
        $user = Auth::user();

        $request->validate([
            'kategori' => 'required|max:50',
            'keterangan' => 'required|max:50'
        ]);

        if ($user->role == 'admin') {
            $katBerita->update([
                'kategori' => $request->kategori,
                'keterangan' => $request->keterangan
            ]);

            return response()->json([
                'message' => "Data Kategori Berita Updated Successfully!",
                'Kategori Berita Baru' => $katBerita
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function destroy($id)
    {
        $user = Auth::user();

        if ($user->role == 'admin') {
            $katBerita = Kat_berita::find($id)->delete();
            return response()->json([
                'message' => "Data Kategori Berita Deleted Successfully!"
            ]);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
    }
}
