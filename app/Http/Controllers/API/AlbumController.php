<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
{
    public function view()
    {
        $album = Album::orderBy('id', 'ASC')->get();
        return response()->json([
            'message' => "Data Album Loaded Successfully!",
            'Album' => $album
        ], Response::HTTP_OK);
    }

    public function viewById($id)
    {
        $album = Album::find($id);
        return response()->json([
            'message' => "Data Album Loaded Successfully",
            'Album' => $album
        ], Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tgl' => 'required',
            'cover' => 'required',
            'user_id' => 'required'
        ]);

        $album = new Album;
        $album->judul = $request->judul;
        $album->tgl = $request->tgl;
        $album->cover = $request->cover;
        $album->user_id = $request->user_id;
        $album->save();

        return response()->json([
            'message' => "Data Album Added Successfully!",
            'Added Album' => $album
        ], Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $album = Album::find($id);

        $request->validate([
            'judul' => 'required',
            'tgl' => 'required',
            'cover' => 'required',
            'user_id' => 'required'
        ]);

        $album->update([
            'judul' => $request->judul,
            'tgl' => $request->tgl,
            'cover' => $request->cover,
            'user_id' => $request->user_id
        ]);

        return response()->json([
            'message' => "Data Album Updated Successfully!",
            'Updated Album' => $album
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $album = Album::find($id)->delete();
        return response()->json([
            'message' => "Data Album Deleted Successfully!"
        ], Response::HTTP_OK);
    }

    public function album()
    {
        $album = DB::table('albums')
            ->join('penggunas', 'albums.user_id', '=', 'penggunas.id')
            ->select('albums.id', 'albums.judul', 'albums.tgl', 'albums.cover', 'penggunas.username')
            ->get();

        return response()->json([
            'message' => "Data Album Loaded Successfully!",
            'Album' => $album
        ], Response::HTTP_OK);
    }

    public function albumById($id)
    {
        $album = DB::table('albums')
            ->join('penggunas', 'albums.user_id', '=', 'penggunas.id')
            ->select('albums.judul', 'albums.tgl', 'albums.cover', 'penggunas.username')
            ->where('albums.id', $id)
            ->get();

        return response()->json([
            'message' => "Data Album Loaded Successfully!",
            'Album' => $album
        ], Response::HTTP_OK);
    }
}
