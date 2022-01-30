<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Galerivideo;
use Illuminate\Support\Facades\DB;

class GalerivideoController extends Controller
{
    public function view()
    {
        $video = Galerivideo::orderBy('id', 'ASC')->get();
        return response()->json([
            'message' => "Data Galerivideo Loaded Successfully!",
            'Galerivideo' => $video
        ], Response::HTTP_OK);
    }

    public function viewById($id)
    {
        $video = Galerivideo::find($id);
        return response()->json([
            'message' => "Data Galerivideo Laoded Successfully!",
            'Galerivideo' => $video
        ], Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'cover' => 'required',
            'embed' => 'required',
            'keterangan' => 'required',
            'user_id' => 'required'
        ]);

        $video = new Galerivideo;
        $video->judul = $request->judul;
        $video->cover = $request->cover;
        $video->embed = $request->embed;
        $video->keterangan = $request->keterangan;
        $video->user_id = $request->user_id;
        $video->save();

        return response()->json([
            'message' => "Data Galerivideo Added Successfully!",
            'Added Galerivideo' => $video
        ], Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $video = Galerivideo::find($id);

        $request->validate([
            'judul' => 'required',
            'cover' => 'required',
            'embed' => 'required',
            'keterangan' => 'required',
            'user_id' => 'required'
        ]);

        $video->update([
            'judul' => $request->judul,
            'cover' => $request->cover,
            'embed' => $request->embed,
            'keterangan' => $request->keterangan,
            'user_id' => $request->user_id
        ]);

        return response()->json([
            'message' => "Data Galerivideo Updated Successfully!",
            'Updated Galerivideo' => $video
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $video = Galerivideo::find($id)->delete();
        return response()->json([
            'message' => "Data Galerivideo Deleted Successfully!"
        ], Response::HTTP_OK);
    }

    public function galerivideo()
    {
        $video = DB::table('galerivideos')
            ->join('penggunas', 'galerivideos.user_id', '=', 'penggunas.id')
            ->select('galerivideos.id', 'galerivideos.cover', 'galerivideos.embed', 'galerivideos.keterangan', 'penggunas.username')
            ->get();

        return response()->json([
            'message' => "Data Galerivideo Loaded Successfully!",
            'Galerivideo' => $video
        ], Response::HTTP_OK);
    }

    public function galerivideoById($id)
    {
        $video = DB::table('galerivideos')
            ->join('penggunas', 'galerivideos.user_id', '=', 'penggunas.id')
            ->select('galerivideos.cover', 'galerivideos.embed', 'galerivideos.keterangan', 'penggunas.username')
            ->where('galerivideos.id', $id)
            ->get();

        return response()->json([
            'message' => "Data Galerivideo Loaded Successfully!",
            'Galerivideo' => $video
        ], Response::HTTP_OK);
    }
}
