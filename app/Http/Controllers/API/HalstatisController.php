<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Halstatis;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HalstatisController extends Controller
{
    public function view()
    {
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
                'file' => 'nullable|mimes:jpeg,jpg,png|max:5000',
                'tgl' => 'required|date',
                'status' => 'required|in:0,1',
                'user_id' => 'required|max:11'
            ]);

            $halstatis = new Halstatis;
            $halstatis->judul = $request->judul;
            $halstatis->kategori_id = $request->kategori_id;
            $halstatis->isi = $request->isi;
            $halstatis->file = $request->file('file')->store('images');
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
                'file' => 'nullable|mimes:jpeg,jpg,png|max:5000',
                'tgl' => 'required|date',
                'status' => 'required|in:0,1',
                'user_id' => 'required|max:11'
            ]);

            $halstatis->update([
                'judul' => $request->judul,
                'kategori_id' => $request->kategori_id,
                'isi' => $request->isi,
                'file' => $request->file('file')->store('images'),
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

        if ($user->role == 'admin') {
            $halstatis = Halstatis::find($id)->delete();
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
