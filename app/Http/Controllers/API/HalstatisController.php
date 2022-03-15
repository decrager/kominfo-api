<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Counter;
use App\Models\Halstatis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class HalstatisController extends Controller
{
    public function view()
    {
        // Counter
        $today = Carbon::today()->toDateString();
        $check = Counter::select('api', 'tanggal', 'visit')->where('api', 'Hal Statis')->where('tanggal', $today)->get();
        $tanggal = Counter::select('tanggal')->where('api', 'Hal Statis')->where('tanggal', $today)->first();

        if ($check->isEmpty()) {
            $counter = new Counter;
            $counter->api = 'Hal Statis';
            $counter->tanggal = $today;
            $counter->visit = 1;
            $counter->save();
        } elseif ($tanggal->tanggal == $today) {
            $counter = Counter::where('api', 'Hal Statis')->where('tanggal', $today);
            $counter->increment('visit');
        } elseif ($tanggal->tanggal != $today) {
            $counter = new Counter;
            $counter->api = 'Hal Statis';
            $counter->tanggal = $today;
            $counter->visit = 1;
            $counter->save();
        }
        // End Counter

        $halstatis = Halstatis::orderBy('id', 'ASC')->get();
        return response()->json([
            'message' => "Data Halstatis Loaded Successfully!",
            'Halstatis' => $halstatis
        ], Response::HTTP_OK);
    }

    public function viewById($id)
    {
        $halstatis = Halstatis::find($id);
        return response()->json([
            'message' => "Data Halstatis Loaded Successfully!",
            'Halstatis' => $halstatis
        ], Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $user = Auth::user();

        if ($user->role == 'admin') {
            $request->validate([
                'judul' => 'required|max:100',
                'kategori_id' => 'required|max:11',
                'isi' => 'required',
                'file' => 'nullable|mimes:jpeg,jpg,png|max:3072',
                'tgl' => 'required|date',
                'status' => 'required|in:0,1',
                'user_id' => 'required|max:11'
            ]);

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('images/statis', $fileName);

            $halstatis = new Halstatis;
            $halstatis->judul = $request->judul;
            $halstatis->kategori_id = $request->kategori_id;
            $halstatis->isi = $request->isi;
            $halstatis->file = $fileName;
            $halstatis->tgl = $request->tgl;
            $halstatis->status = $request->status;
            $halstatis->user_id = $request->user_id;
            $halstatis->save();

            return response()->json([
                'message' => "Data Halstatis Added Successfully!",
                'Added Halstatis' => $halstatis
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function update(Request $request, $id)
    {
        $halstatis = Halstatis::find($id);
        $user = Auth::user();

        if ($user->role == 'admin') {
            $request->validate([
                'judul' => 'required|max:100',
                'kategori_id' => 'required|max:11',
                'isi' => 'required',
                'file' => 'nullable|mimes:jpeg,jpg,png|max:3072',
                'tgl' => 'required|date',
                'status' => 'required|in:0,1',
                'user_id' => 'required|max:11'
            ]);

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('images/statis', $fileName);

            $destination = 'images/statis/' . $halstatis->file;
            if ($destination) {
                Storage::delete($destination);
            }

            $halstatis->update([
                'judul' => $request->judul,
                'kategori_id' => $request->kategori_id,
                'isi' => $request->isi,
                'file' => $fileName,
                'tgl' => $request->tgl,
                'status' => $request->status,
                'user_id' => $request->user_id
            ]);

            return response()->json([
                'message' => "Data Halstatis Updated Successfully!",
                'Updated Halstatis' => $halstatis
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
        $halstatis = Halstatis::find($id);
        $destination = 'images/statis/' . $halstatis->file;

        if ($user->role == 'admin') {
            if ($destination) {
                Storage::delete($destination);
            }
            Halstatis::find($id)->delete();
            return response()->json([
                'message' => "Data Halstatis Deleted Successfully!"
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function halstatis()
    {
        // Counter
        $today = Carbon::today()->toDateString();
        $check = Counter::select('api', 'tanggal', 'visit')->where('api', 'Relational Hal Statis')->where('tanggal', $today)->get();
        $tanggal = Counter::select('tanggal')->where('api', 'Relational Hal Statis')->where('tanggal', $today)->first();

        if ($check->isEmpty()) {
            $counter = new Counter;
            $counter->api = 'Relational Hal Statis';
            $counter->tanggal = $today;
            $counter->visit = 1;
            $counter->save();
        } elseif ($tanggal->tanggal == $today) {
            $counter = Counter::where('api', 'Relational Hal Statis')->where('tanggal', $today);
            $counter->increment('visit');
        } elseif ($tanggal->tanggal != $today) {
            $counter = new Counter;
            $counter->api = 'Relational Hal Statis';
            $counter->tanggal = $today;
            $counter->visit = 1;
            $counter->save();
        }
        // End Counter

        $halstatis = Halstatis::with('Kat_halstatis', 'Pengguna')
            ->select(
                'id',
                'judul',
                'kategori_id',
                'isi',
                'file',
                'tgl',
                'status',
                'user_id'
            )->get();

        return response()->json([
            'message' => "Data Halstatis Loaded Successfully!",
            'Halstatis' => $halstatis
        ], Response::HTTP_OK);
    }

    public function halstatisById($id)
    {
        $halstatis = Halstatis::with('Kat_halstatis', 'Pengguna')
            ->select(
                'id',
                'judul',
                'kategori_id',
                'isi',
                'file',
                'tgl',
                'status',
                'user_id'
            )
            ->where('id',$id)
            ->get();

        return response()->json([
            'message' => "Data Halstatis Loaded Successfully!",
            'Halstatis' => $halstatis
        ], Response::HTTP_OK);
    }
}
