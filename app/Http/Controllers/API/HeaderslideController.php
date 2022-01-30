<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Headerslide;

class HeaderslideController extends Controller
{
    public function view()
    {
        $header = Headerslide::orderBy('id', 'ASC')->get();
        return response()->json([
            'message' => "Data Headerslide Loaded Successfully!",
            'Banner' => $header
        ], Response::HTTP_OK);
    }

    public function viewById($id)
    {
        $header = Headerslide::find($id);
        return response()->json([
            'message' => "Data Headerslide Loaded Successfully!",
            'Header' => $header
        ], Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'file' => 'required',
            'keterangan' => 'required',
            'status' => 'required'
        ]);

        $header = new Headerslide;
        $header->judul = $request->judul;
        $header->file = $request->file;
        $header->keterangan = $request->keterangan;
        $header->status = $request->status;
        $header->save();

        return response()->json([
            'message' => "Data Headerslide Added Successfully!",
            'Added Headerslide' => $header
        ], Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $header = Headerslide::find($id);

        $request->validate([
            'judul' => 'required',
            'file' => 'required',
            'keterangan' => 'required',
            'status' => 'required'
        ]);

        $header->update([
            'judul' => $request->judul,
            'file' => $request->file,
            'keterangan' => $request->keterangan,
            'status' => $request->status
        ]);

        return response()->json([
            'message' => "Data Headerslide Updated Successfully!",
            'Updated Headerslide' => $header
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $header = Headerslide::find($id)->delete();
        return response()->json([
            'message' => "Data Headerslide Deleted Successfully!"
        ], Response::HTTP_OK);
    }
}
