<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseHasCookie;

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
        $user = Auth::user();

        if ($user->role == 'admin') {
            $request->validate([
                'judul' => 'required|max:100',
                'tgl' => 'required|date',
                'cover' => 'required|mimes:jpeg,jpg,png|max:5000',
                'user_id' => 'required|max:11'
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
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function update(Request $request, $id)
    {
        $album = Album::find($id);
        $user = Auth::user();

        if ($user->role == 'admin') {
            $request->validate([
                'judul' => 'required|max:100',
                'tgl' => 'required|date',
                'cover' => 'required|mimes:jpg,png,jpeg|max:5000',
                'user_id' => 'required|max:11'
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
            $album = Album::find($id)->delete();
            return response()->json([
                'message' => "Data Album Deleted Successfully!"
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
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
