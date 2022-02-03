<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Kat_HalStatis;

class KatHalStatisController extends Controller
{
    public function view()
    {
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
        $request->validate([
            'kategori' => 'required|max:50',
            'keterangan' => 'required|max:50'
        ]);

        $user = Auth::user();

        if ($user->role == 'admin') {
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

        $request->validate([
            'kategori' => 'required|max:50',
            'keterangan' => 'required|max:50'
        ]);

        if ($user->role == 'admin') {
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
