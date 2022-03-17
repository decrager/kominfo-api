<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Berita;
use App\Models\Counter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class BeritaController extends Controller
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
        $this->counter('Berita');

        if ($request->order == 'DESC' or $request->order == 'ASC') {
            $berita = Berita::orderBy('id', $request->order)->get();
        } else {
            $berita = Berita::orderBy('id', 'ASC')->get();
        }

        return response()->json([
            'message' => "Data Berita Loaded Successfully!",
            'Berita' => $berita
        ], Response::HTTP_OK);
    }

    public function viewById($id)
    {
        $berita = Berita::find($id);
        return response()->json([
            'message' => "Data Berita Loaded Successfully!",
            'Berita' => $berita
        ], Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $this->counter('Berita');

        $user = Auth::user();

        if ($user->role == 'admin') {
            $request->validate([
                'judul' => 'required|max:100',
                'kategori_id' => 'required|max:11',
                'isi' => 'required',
                'gambar' => 'required|mimes:jpeg,jpg,png|max:3072',
                'tgl' => 'required|date',
                'status' => 'required|in:0,1',
                'user_id' => 'required|max:11'
            ]);

            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('images/berita', $fileName);

            $berita = new Berita;
            $berita->judul = $request->judul;
            $berita->kategori_id = $request->kategori_id;
            $berita->isi = $request->isi;
            $berita->gambar = $fileName;
            $berita->tgl = $request->tgl;
            $berita->status = $request->status;
            $berita->user_id = $request->user_id;
            $berita->save();

            return response()->json([
                'message' => "Data Berita Added Successfully!",
                'Added Berita' => $berita
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function update(Request $request, $id)
    {
        $this->counter('Berita');

        $berita = Berita::find($id);
        $user = Auth::user();

        if ($user->role == 'admin') {
            $request->validate([
                'judul' => 'required|max:100',
                'kategori_id' => 'required|max:11',
                'isi' => 'required',
                'gambar' => 'required|mimes:jpeg,jpg,png|max:3072',
                'tgl' => 'required|date',
                'status' => 'required|in:0,1',
                'user_id' => 'required|max:11'
            ]);

            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('images/berita', $fileName);

            $destination = 'images/berita/' . $berita->gambar;
            if ($destination) {
                Storage::delete($destination);
            }

            $berita->update([
                'judul' => $request->judul,
                'kategori_id' => $request->kategori_id,
                'isi' => $request->isi,
                'gambar' => $fileName,
                'tgl' => $request->tgl,
                'status' => $request->status,
                'user_id' => $request->user_id
            ]);

            return response()->json([
                'message' => "Data Berita Updated Successfully!",
                'Updated Berita' => $berita
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function destroy($id)
    {
        $this->counter('Berita');

        $user = Auth::user();
        $berita = Berita::find($id);
        $destination = 'images/berita/' . $berita->gambar;

        if ($user->role == 'admin') {
            if ($destination) {
                Storage::delete($destination);
            }
            Berita::find($id)->delete();
            return response()->json([
                'message' => "Data Berita Deleted Successfully!"
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function berita(Request $request)
    {
        $this->counter('Relational Berita');

        $berita = Berita::with('Kat_berita', 'Pengguna');

        if ($request->order == 'DESC' or $request->order == 'ASC') {
            $berita = $berita->orderBy('id', $request->order);
        }

        $berita = $berita->select(
            'beritas.id',
            'beritas.judul',
            'beritas.kategori_id',
            'beritas.isi',
            'beritas.gambar',
            'beritas.tgl',
            'beritas.status',
            'beritas.user_id'
        );

        if ($request->category) {
            $category = $request->category;
            $show = $berita->join('kat_beritas', 'beritas.kategori_id', '=', 'kat_beritas.id')
                ->where('kat_beritas.kategori', 'like', '%' . $category . '%')->get();
        } else {
            $show = $berita->get();
        }

        return response()->json([
            'message' => "Data Berita with Kategori & Pengguna Loaded Successfully!",
            'Berita' => $show
        ], Response::HTTP_OK);
    }

    public function beritaPublic(Request $request)
    {
        $this->counter('Relational Berita');

        $berita = Berita::with('Kat_berita', 'Pengguna');

        if ($request->order == 'DESC' or $request->order == 'ASC') {
            $berita = $berita->orderBy('id', $request->order);
        } else {
            $berita = $berita->orderBy('id', 'DESC');
        }

        $berita = $berita->select(
            'beritas.id',
            'beritas.judul',
            'beritas.kategori_id',
            'beritas.isi',
            'beritas.gambar',
            'beritas.tgl',
            'beritas.status',
            'beritas.user_id'
        );

        if ($request->search) {
            $berita->where('judul', 'like', '%' . $request->search . '%')
                ->orWhere('isi', 'like', '%' . $request->search . '%');
        }

        if ($request->category) {
            $category = $request->category;
            $show = $berita->join('kat_beritas', 'beritas.kategori_id', '=', 'kat_beritas.id')
                ->where('kat_beritas.kategori', 'like', '%' . $category . '%');
        } else {
            $show = $berita;
        }

        if ($request->perPage) {
            $perPage = $request->perPage;
            $show = $berita->paginate($perPage);
        } else {
            $show = $berita->get();
        }

        return response()->json([
            'message' => "Data Berita with Kategori & Pengguna Loaded Successfully!",
            'Berita' => $show
        ], Response::HTTP_OK);
    }

    public function beritaById($id)
    {
        $this->counter('Relational Berita');

        $berita = Berita::with('Kat_berita', 'Pengguna')
            ->select(
                'id',
                'judul',
                'kategori_id',
                'isi',
                'gambar',
                'tgl',
                'status',
                'user_id'
            )
            ->where('id', $id)
            ->get();

        return response()->json([
            'message' => "Data Berita with Kategori & Pengguna Loaded Successfully!",
            'Berita' => $berita
        ], Response::HTTP_OK);
    }
}
