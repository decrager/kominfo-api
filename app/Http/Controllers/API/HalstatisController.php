<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Halstatis;
use Illuminate\Support\Facades\DB;

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
        $request->validate([
            'judul' => 'required',
            'kategori_id' => 'required',
            'isi' => 'required',
            'file' => 'required',
            'tgl' => 'required',
            'status' => 'required',
            'user_id' => 'required'
        ]);

        $halstatis = new Halstatis;
        $halstatis->judul = $request->judul;
        $halstatis->kategori_id = $request->kategori_id;
        $halstatis->isi = $request->isi;
        $halstatis->file = $request->file;
        $halstatis->tgl = $request->tgl;
        $halstatis->status = $request->status;
        $halstatis->user_id = $request->user_id;
        $halstatis->save();

        return response()->json([
            'message' => "Data Halstatis Added Successfully!",
            'Added Halstatis' => $halstatis
        ], Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $halstatis = Halstatis::find($id);

        $request->validate([
            'judul' => 'required',
            'kategori_id' => 'required',
            'isi' => 'required',
            'file' => 'required',
            'tgl' => 'required',
            'status' => 'required',
            'user_id' => 'required'
        ]);

        $halstatis->update([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'isi' => $request->isi,
            'file' => $request->file,
            'tgl' => $request->tgl,
            'status' => $request->status,
            'user_id' => $request->user_id
        ]);

        return response()->json([
            'message' => "Data Halstatis Updated Successfully!",
            'Updated Halstatis' => $halstatis
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $halstatis = Halstatis::find($id)->delete();
        return response()->json([
            'message' => "Data Halstatis Deleted Successfully!"
        ], Response::HTTP_OK);
    }

    public function halstatis()
    {
        $halstatis = DB::table('halstatis')
            ->join('kat_halstatis', 'halstatis.kategori_id', '=', 'kat_halstatis.id')
            ->join('penggunas', 'halstatis.user_id', '=', 'penggunas.id')
            ->select('halstatis.id', 'kat_halstatis.kategori', 'halstatis.isi', 'halstatis.file', 'halstatis.tgl', 'halstatis.status', 'penggunas.username')
            ->get();

        return response()->json([
            'message' => "Data Halstatis Loaded Successfully!",
            'Halstatis' => $halstatis
        ], Response::HTTP_OK);
    }

    public function halstatisById($id)
    {
        $halstatis = DB::table('halstatis')
            ->join('kat_halstatis', 'halstatis.kategori_id', '=', 'kat_halstatis.id')
            ->join('penggunas', 'halstatis.user_id', '=', 'penggunas.id')
            ->select('kat_halstatis.kategori', 'halstatis.isi', 'halstatis.file', 'halstatis.tgl', 'halstatis.status', 'penggunas.username')
            ->where('halstatis.id', $id)
            ->get();

        return response()->json([
            'message' => "Data Halstatis Loaded Successfully!",
            'Halstatis' => $halstatis
        ], Response::HTTP_OK);
    }
}
