<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\Counter;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AgendaController extends Controller
{
    public function view()
    {
        // Counter
        $today = Carbon::today()->toDateString();
        $check = Counter::select('api', 'tanggal', 'visit')->where('api', 'Agenda')->where('tanggal', $today)->get();
        $tanggal = Counter::select('tanggal')->where('api', 'Agenda')->where('tanggal', $today)->first();

        if ($check->isEmpty()) {
            $counter = new Counter;
            $counter->api = 'Agenda';
            $counter->tanggal = $today;
            $counter->visit = 1;
            $counter->save();
        } elseif ($tanggal->tanggal == $today) {
            $counter = Counter::where('api', 'Agenda')->where('tanggal', $today);
            $counter->increment('visit');
        } elseif ($tanggal->tanggal != $today) {
            $counter = new Counter;
            $counter->api = 'Agenda';
            $counter->tanggal = $today;
            $counter->visit = 1;
            $counter->save();
        }
        // End Counter

        $agenda = Agenda::orderBy('id', 'ASC')->get();
        return response()->json([
            'message' => "Data Agenda Loaded Successfully!",
            'Agenda' => $agenda
        ], Response::HTTP_OK);
    }

    public function viewById($id)
    {
        $agenda = Agenda::find($id);
        return response()->json([
            'message' => "Data Agenda Loaded Successfully!",
            'Agenda' => $agenda
        ], Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $user = Auth::user();

        if ($user->role == 'admin') {
            $request->validate([
                'hari' => 'required|max:10',
                'tgl' => 'required|date',
                'waktu' => 'required|date_format:H:i:s',
                'lokasi' => 'required|max:100',
                'kegiatan' => 'required|max:250',
                'user_id' => 'required|max:11'
            ]);

            $agenda = new Agenda;
            $agenda->hari = $request->hari;
            $agenda->tgl = $request->tgl;
            $agenda->waktu = $request->waktu;
            $agenda->lokasi = $request->lokasi;
            $agenda->kegiatan = $request->kegiatan;
            $agenda->user_id = $request->user_id;
            $agenda->save();

            return response()->json([
                'message' => "Data Agenda Added Successfully!",
                'Added Agenda' => $agenda
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $agenda = Agenda::find($id);

        if ($user->role == 'admin') {
            $request->validate([
                'hari' => 'required|max:10',
                'tgl' => 'required|date',
                'waktu' => 'required|date_format:H:i:s',
                'lokasi' => 'required|max:100',
                'kegiatan' => 'required|max:250',
                'user_id' => 'required|max:11'
            ]);

            $agenda->update([
                'hari' => $request->hari,
                'tgl' => $request->tgl,
                'waktu' => $request->waktu,
                'lokasi' => $request->lokasi,
                'kegiatan' => $request->kegiatan,
                'user_id' => $request->user_id
            ]);

            return response()->json([
                'message' => "Data Agenda Updated Successfully!",
                'Updated Agenda' => $agenda
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
            $agenda = Agenda::find($id)->delete();
            return response()->json([
                'message' => "Data Agenda Deleted Successfully!"
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function agenda()
    {
        // Counter
        $today = Carbon::today()->toDateString();
        $check = Counter::select('api', 'tanggal', 'visit')->where('api', 'Relational Agenda')->where('tanggal', $today)->get();
        $tanggal = Counter::select('tanggal')->where('api', 'Relational Agenda')->where('tanggal', $today)->first();

        if ($check->isEmpty()) {
            $counter = new Counter;
            $counter->api = 'Relational Agenda';
            $counter->tanggal = $today;
            $counter->visit = 1;
            $counter->save();
        } elseif ($tanggal->tanggal == $today) {
            $counter = Counter::where('api', 'Relational Agenda')->where('tanggal', $today);
            $counter->increment('visit');
        } elseif ($tanggal->tanggal != $today) {
            $counter = new Counter;
            $counter->api = 'Relational Agenda';
            $counter->tanggal = $today;
            $counter->visit = 1;
            $counter->save();
        }
        // End Counter

        $agenda = Agenda::with('Pengguna')
            ->select(
                'id',
                'hari',
                'tgl',
                'waktu',
                'lokasi',
                'kegiatan',
                'user_id',
            )
            ->get();

        return response()->json([
            'message' => "Data Agenda with Pengguna Loaded Successfully!",
            'Agenda' => $agenda
        ], Response::HTTP_OK);
    }

    public function agendaById($id)
    {
        $agenda = Agenda::with('Pengguna')
            ->select(
                'id',
                'hari',
                'tgl',
                'waktu',
                'lokasi',
                'kegiatan',
                'user_id',
            )
            ->where('id', $id)
            ->get();

        return response()->json([
            'message' => "Data Agenda with Pengguna Loaded Successfully!",
            'Agenda' => $agenda
        ], Response::HTTP_OK);
    }
}
