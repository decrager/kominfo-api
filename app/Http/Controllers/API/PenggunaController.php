<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Counter;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class PenggunaController extends Controller
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
        $this->counter('Pengguna');
        
        $pengguna = Pengguna::orderBy('id', 'ASC')->get();
        return response()->json([
            'message' => "Data Pengguna Loaded Successfully!",
            'Pengguna' => $pengguna
        ], Response::HTTP_OK);
    }

    public function viewById($id)
    {
        $this->counter('Pengguna');

        $pengguna = Pengguna::find($id);
        return response()->json([
            'message' => "Data Pengguna Loaded Successfully!",
            'Pengguna' => $pengguna
        ], Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $this->counter('Pengguna');

        $user = Auth::user();

        if ($user->role == 'admin') {
            $request->validate([
                'nama' => 'required|max:50',
                'email' => 'required|max:50',
                'telp' => 'required|max:15',
                'username' => 'required|max:25',
                'password' => 'required|max:100',
                'role' => 'required|max:25',
                'foto' => 'required|mimes:jpeg,jpg,png|max:3072',
                'level' => 'required|max:2'
            ]);

            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('images/fotoPengguna', $fileName);
            
            $pengguna = new Pengguna;
            $pengguna->nama = $request->nama;
            $pengguna->email = $request->email;
            $pengguna->telp = $request->telp;
            $pengguna->username = $request->username;
            $pengguna->password = Hash::make($request->password);
            $pengguna->role = $request->role;
            $pengguna->foto = $fileName;
            $pengguna->level = $request->level;
            $pengguna->save();

            return response()->json([
                'message' => "Data Pengguna Added Successfully!",
                'Added Pengguna' => $pengguna
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function update(Request $request, $id)
    {
        $this->counter('Pengguna');

        $pengguna = Pengguna::find($id);
        $user = Auth::user();

        if ($user->role == 'admin') {
            $request->validate([
                'nama' => 'required|max:50',
                'email' => 'required|max:50',
                'telp' => 'required|max:15',
                'username' => 'required|max:25',
                'password' => 'required|max:100',
                'role' => 'required|max:25',
                'foto' => 'required|mimes:jpeg,jpg,png|max:3072',
                'level' => 'required|max:2'
            ]);

            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('images/fotoPengguna', $fileName);

            $destination = 'images/fotoPengguna/' . $pengguna->foto;
            if ($destination) {
                Storage::delete($destination);
            }

            $pengguna->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'telp' => $request->telp,
                'username' => $request->username,
                'password' => $request->password,
                'role' => $request->role,
                'foto' => $fileName,
                'level' => $request->level
            ]);

            return response()->json([
                'message' => "Data Pengguna Updated Successfully!",
                'Updated Pengguna' => $pengguna
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function destroy($id)
    {
        $this->counter('Pengguna');
        
        $user = Auth::user();
        $pengguna = Pengguna::find($id);
        $destination = 'images/fotoPengguna/' . $pengguna->foto;

        if ($user->role == 'admin') {
            if ($destination) {
                Storage::delete($destination);
            }
            $pengguna = Pengguna::find($id)->delete();
            return response()->json([
                'message' => "Data Pengguna Deleted Successfully!"
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
    }
}
