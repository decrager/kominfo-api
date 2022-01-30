<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PenggunaController extends Controller
{
    public function view()
    {
        $pengguna = Pengguna::orderBy('id', 'ASC')->get();
        return response()->json([
            'message' => "Data Pengguna Loaded Successfully!",
            'Pengguna' => $pengguna
        ], Response::HTTP_OK);
    }

    public function viewById($id)
    {
        $pengguna = Pengguna::find($id);
        return response()->json([
            'message' => "Data Pengguna Loaded Successfully!",
            'Pengguna' => $pengguna
        ], Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'username' => 'required',
            'password' => 'required',
            'foto' => 'required',
            'level' => 'required'
        ]);

        $pengguna = new Pengguna;
        $pengguna->nama = $request->nama;
        $pengguna->email = $request->email;
        $pengguna->telp = $request->telp;
        $pengguna->username = $request->username;
        $pengguna->password = Hash::make($request->password);
        $pengguna->foto = $request->foto;
        $pengguna->level = $request->level;
        $pengguna->save();

        return response()->json([
            'message' => "Data Pengguna Added Successfully!",
            'Added Pengguna' => $pengguna
        ], Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $pengguna = Pengguna::find($id);

        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'username' => 'required',
            'password' => 'required',
            'foto' => 'required',
            'level' => 'required'
        ]);

        $pengguna->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'telp' => $request->telp,
            'username' => $request->username,
            'password' => $request->password,
            'foto' => $request->foto,
            'level' => $request->level
        ]);

        return response()->json([
            'message' => "Data Pengguna Updated Successfully!",
            'Updated Pengguna' => $pengguna
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $pengguna = Pengguna::find($id)->delete();
        return response()->json([
            'message' => "Data Pengguna Deleted Successfully!"
        ], Response::HTTP_OK);
    }
}
