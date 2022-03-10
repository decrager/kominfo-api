<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Galerivideo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GalerivideoController extends Controller
{
    public function view()
    {
        $video = Galerivideo::orderBy('id', 'ASC')->get();
        return response()->json([
            'message' => "Data Galerivideo Loaded Successfully!",
            'Galerivideo' => $video
        ], Response::HTTP_OK);
    }

    public function viewById($id)
    {
        $video = Galerivideo::find($id);
        return response()->json([
            'message' => "Data Galerivideo Laoded Successfully!",
            'Galerivideo' => $video
        ], Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $user = Auth::user();

        if ($user->role == 'admin') {
            $request->validate([
                'judul' => 'required|max:85',
                'cover' => 'required|mimes:jpeg,jpg,png|max:3072',
                'embed' => 'required|max:50',
                'keterangan' => 'required|max:200',
                'user_id' => 'required|max:11'
            ]);

            $file = $request->file('cover');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('images/coverVideo', $fileName);

            $video = new Galerivideo;
            $video->judul = $request->judul;
            $video->cover = $request->file('cover')->getClientOriginalName();
            $video->embed = $request->embed;
            $video->keterangan = $request->keterangan;
            $video->user_id = $request->user_id;
            $video->save();

            return response()->json([
                'message' => "Data Galerivideo Added Successfully!",
                'Added Galerivideo' => $video
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function update(Request $request, $id)
    {
        $video = Galerivideo::find($id);
        $user = Auth::user();

        if ($user->role == 'admin') {
            $request->validate([
                'judul' => 'required|max:85',
                'cover' => 'required|mimes:jpeg,jpg,png|max:3072',
                'embed' => 'required|max:50',
                'keterangan' => 'required|max:200',
                'user_id' => 'required|max:11'
            ]);

            $file = $request->file('cover');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('images/coverVideo', $fileName);

            $destination = 'images/coverVideo/' . $video->cover;
            if ($destination) {
                Storage::delete($destination);
            }

            $video->update([
                'judul' => $request->judul,
                'cover' => $request->file('cover')->getClientOriginalName(),
                'embed' => $request->embed,
                'keterangan' => $request->keterangan,
                'user_id' => $request->user_id
            ]);

            return response()->json([
                'message' => "Data Galerivideo Updated Successfully!",
                'Updated Galerivideo' => $video
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
        $video = Galerivideo::find($id);
        $destination = 'images/coverVideo/' . $video->cover;

        if ($user->role == 'admin') {
            if ($destination) {
                Storage::delete($destination);
            }
            Galerivideo::find($id)->delete();
            return response()->json([
                'message' => "Data Galerivideo Deleted Successfully!"
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function galerivideo()
    {
        $video = Galerivideo::with('Pengguna')
            ->select(
                'id',
                'judul',
                'cover',
                'embed',
                'keterangan',
                'user_id'
            )->get();

        return response()->json([
            'message' => "Data Galerivideo Loaded Successfully!",
            'Galerivideo' => $video
        ], Response::HTTP_OK);
    }

    public function galerivideoById($id)
    {
        $video = Galerivideo::with('Pengguna')
            ->select(
                'id',
                'judul',
                'cover',
                'embed',
                'keterangan',
                'user_id'
            )
            ->where('id', $id)
            ->get();

        return response()->json([
            'message' => "Data Galerivideo Loaded Successfully!",
            'Galerivideo' => $video
        ], Response::HTTP_OK);
    }
}
