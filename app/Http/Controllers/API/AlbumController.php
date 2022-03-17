<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\Counter;
use Illuminate\Support\Facades\Redis;

class AlbumController extends Controller
{
    public function counter($API)
    {
        $today = Carbon::today()->toDateString();
        $check = Counter::select('api', 'tanggal', 'visit')->where('api', $API)->where('tanggal', $today)->get();
        $tanggal = Counter::select('tanggal')->where('api', $API)->where('tanggal', $today)->first();

        if ($check->isEmpty()) {
            $counter = new Counter;
            $counter->api = $API;
            $counter->tanggal = $today;
            $counter->visit = 1;
            $counter->save();
        } elseif ($tanggal->tanggal == $today) {
            $counter = Counter::where('api', $API)->where('tanggal', $today);
            $counter->increment('visit');
        } elseif ($tanggal->tanggal != $today) {
            $counter = new Counter;
            $counter->api = $API;
            $counter->tanggal = $today;
            $counter->visit = 1;
            $counter->save();
        }
    }

    public function view(Request $request)
    {
        $this->counter('Album');

        if ($request->order == 'DESC' or $request->order == 'ASC') {
            $album = Album::orderBy('id', $request->order)->get();
        } else {
            $album = Album::orderBy('id', 'ASC')->get();
        }

        return response()->json([
            'message' => "Data Album Loaded Successfully!",
            'Album' => $album
        ], Response::HTTP_OK);
    }

    public function viewById($id)
    {
        $this->counter('Album');

        $album = Album::find($id);
        return response()->json([
            'message' => "Data Album Loaded Successfully",
            'Album' => $album
        ], Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $this->counter('Album');

        $user = Auth::user();

        if ($user->role == 'admin') {
            $request->validate([
                'judul' => 'required|max:100',
                'tgl' => 'required|date',
                'cover' => 'required|mimes:jpeg,jpg,png|max:3072',
                'user_id' => 'required|max:11'
            ]);

            $file = $request->file('cover');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('images/album', $fileName);

            $album = new Album;
            $album->judul = $request->judul;
            $album->tgl = $request->tgl;
            $album->cover = $fileName;
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
        $this->counter('Album');

        $album = Album::find($id);
        $user = Auth::user();

        if ($user->role == 'admin') {
            $request->validate([
                'judul' => 'required|max:100',
                'tgl' => 'required|date',
                'cover' => 'required|mimes:jpg,png,jpeg|max:3072',
                'user_id' => 'required|max:11'
            ]);

            $file = $request->file('cover');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('images/album', $fileName);

            $destination = 'images/album/' . $album->cover;
            if ($destination) {
                Storage::delete($destination);
            }

            $album->update([
                'judul' => $request->judul,
                'tgl' => $request->tgl,
                'cover' => $fileName,
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
        $this->counter('Album');

        $user = Auth::user();
        $file = Album::find($id);
        $destination = 'images/album/' . $file->cover;

        if ($user->role == 'admin') {
            if ($destination) {
                Storage::delete($destination);
            }
            Album::find($id)->delete();
            return response()->json([
                'message' => "Data Album Deleted Successfully!"
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function album(Request $request)
    {
        $this->counter('Relational Album');

        $album = Album::with('Pengguna');

        if ($request->order == 'DESC' or $request->order == 'ASC') {
            $album = $album->orderBy('id', $request->order);
        }

        $album = $album->select(
            'id',
            'judul',
            'tgl',
            'cover',
            'user_id'
        )->get();

        return response()->json([
            'message' => "Data Album with Pengguna Loaded Successfully!",
            'Album' => $album
        ], Response::HTTP_OK);
    }

    public function albumById($id)
    {
        $this->counter('Relational Album');

        $album = Album::with('Pengguna')
            ->select(
                'id',
                'judul',
                'tgl',
                'cover',
                'user_id'
            )
            ->where('id', $id)
            ->get();

        return response()->json([
            'message' => "Data Album with Pengguna Loaded Successfully!",
            'Album' => $album
        ], Response::HTTP_OK);
    }
}
