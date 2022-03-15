<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Counter;
use Illuminate\Http\Request;
use App\Models\Kat_HalStatis;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class KatHalStatisController extends Controller
{
    public function view()
    {
        // Counter
        $today = Carbon::today()->toDateString();
        $check = Counter::select('api', 'tanggal', 'visit')->where('api', 'Kategori Hal Statis')->where('tanggal', $today)->get();
        $tanggal = Counter::select('tanggal')->where('api', 'Kategori Hal Statis')->where('tanggal', $today)->first();

        if ($check->isEmpty()) {
            $counter = new Counter;
            $counter->api = 'Kategori Hal Statis';
            $counter->tanggal = $today;
            $counter->visit = 1;
            $counter->save();
        } elseif ($tanggal->tanggal == $today) {
            $counter = Counter::where('api', 'Kategori Hal Statis')->where('tanggal', $today);
            $counter->increment('visit');
        } elseif ($tanggal->tanggal != $today) {
            $counter = new Counter;
            $counter->api = 'Kategori Hal Statis';
            $counter->tanggal = $today;
            $counter->visit = 1;
            $counter->save();
        }
        // End Counter

        $katStatis = Kat_HalStatis::orderBy('id', 'ASC')->get();
        return response()->json([
            'message' => "Data Kat_halstatis Loaded Successfully!",
            'Kat_halstatis' => $katStatis
        ], Response::HTTP_OK);
    }

    public function viewById($id)
    {
        $katStatis = Kat_HalStatis::find($id);
        return response()->json([
            'message' => "Data Kat_halstatis Loaded Successfully!",
            'Kat_halstatis' => $katStatis
        ], Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $user = Auth::user();

        if ($user->role == 'admin') {
            $request->validate([
                'kategori' => 'required|max:50',
                'keterangan' => 'required|max:50'
            ]);

            $katStatis = new Kat_HalStatis;
            $katStatis->kategori = $request->kategori;
            $katStatis->keterangan = $request->keterangan;
            $katStatis->save();

            return response()->json([
                'message' => "Data Kat_halstatis Added Successfully!",
                'Added Kat_halstatis' => $katStatis
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function update(Request $request, $id)
    {
        $katStatis = Kat_HalStatis::find($id);
        $user = Auth::user();

        if ($user->role == 'admin') {
            $request->validate([
                'kategori' => 'required|max:50',
                'keterangan' => 'required|max:50'
            ]);
            
            $katStatis->update([
                'kategori' => $request->kategori,
                'keterangan' => $request->keterangan
            ]);

            return response()->json([
                'message' => "Data Kat_halstatis Updated Successfully!",
                'Updated Kat_halstatis' => $katStatis
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
            $katStatis = Kat_HalStatis::find($id)->delete();
            return response()->json([
                'message' => "Data Kat_halstatis Deleted Successfully!"
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
    }
}
