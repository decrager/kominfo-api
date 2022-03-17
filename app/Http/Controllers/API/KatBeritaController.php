<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Counter;
use App\Models\Kat_berita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class KatBeritaController extends Controller
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
        $this->counter('Kategori Berita');

        $katBerita = Kat_berita::orderBy('id', 'ASC')->get();
        return response()->json([
            'message' => "Data Kategori Berita Loaded Successfully!",
            'Kategori Berita' => $katBerita
        ], Response::HTTP_OK);
    }

    public function viewById($id)
    {
        $this->counter('Kategori Berita');

        $katBerita = Kat_berita::find($id);
        return response()->json([
            'message' => "Data Kategori Berita Loaded Successfully!",
            'Kategori Berita' => $katBerita
        ], Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $this->counter('Kategori Berita');

        $user = Auth::user();

        if ($user->role == 'admin') {
            $request->validate([
                'kategori' => 'required|max:50',
                'keterangan' => 'required|max:50'
            ]);

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
        $this->counter('Kategori Berita');

        $katBerita = Kat_berita::find($id);
        $user = Auth::user();

        if ($user->role == 'admin') {
            $request->validate([
                'kategori' => 'required|max:50',
                'keterangan' => 'required|max:50'
            ]);
            
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
        $this->counter('Kategori Berita');
        
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
