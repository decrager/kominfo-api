<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Counter;
use App\Models\Galerifoto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class GalerifotoController extends Controller
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

    public function view()
    {
        $this->counter('Galeri Foto');
        
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
        $this->counter('Galeri Foto');

        $user = Auth::user();

        if ($user->role == 'admin') {
            $request->validate([
                'album_id' => 'required|max:11',
                'judul' => 'required|max:100',
                'foto' => 'required|mimes:jpeg,jpg,png|max:3072',
                'keterangan' => 'required|max:100'
            ]);

            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('images/foto', $fileName);

            $foto = new Galerifoto;
            $foto->album_id = $request->album_id;
            $foto->judul = $request->judul;
            $foto->foto = $fileName;
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
        $this->counter('Galeri Foto');

        $foto = Galerifoto::find($id);
        $user = Auth::user();

        if ($user->role == 'admin') {
            $request->validate([
                'album_id' => 'required|max:11',
                'judul' => 'required|max:100',
                'foto' => 'required|mimes:jpeg,jpg,png|max:3072',
                'keterangan' => 'required|max:100'
            ]);

            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('images/foto', $fileName);

            $destination = 'images/foto/'.$foto->foto;
            if ($destination) {
                Storage::delete($destination);
            }

            $foto->update([
                'album_id' => $request->album_id,
                'judul' => $request->judul,
                'foto' => $fileName,
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
        $this->counter('Galeri Foto');

        $user = Auth::user();
        $foto = Galerifoto::find($id);
        $destination = 'images/foto/'.$foto->foto;

        if($user->role=="admin") {
            if ($destination) {
                Storage::delete($destination);
            }
            Galerifoto::find($id)->delete();
            return response()->json([
                'message' => "Data Galerifoto Deleted Successfully!"
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function galerifoto()
    {
        $this->counter('Relational Galeri Foto');

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
        $this->counter('Relational Galeri Foto');
        
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
