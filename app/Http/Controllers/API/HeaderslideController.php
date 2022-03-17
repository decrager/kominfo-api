<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Counter;
use App\Models\Headerslide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class HeaderslideController extends Controller
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
        $this->counter('Headerslide');
        
        if ($request->order == 'DESC' or $request->order == 'ASC') {
            $header = Headerslide::orderBy('id', $request->order)->get();
        } else {
            $header = Headerslide::orderBy('id', 'ASC')->get();
        }

        return response()->json([
            'message' => "Data Headerslide Loaded Successfully!",
            'Headerslide' => $header
        ], Response::HTTP_OK);
    }

    public function viewById($id)
    {
        $this->counter('Headerslide');

        $header = Headerslide::find($id);
        return response()->json([
            'message' => "Data Headerslide Loaded Successfully!",
            'Headerslide' => $header
        ], Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $this->counter('Headerslide');

        $user = Auth::user();

        if ($user->role == 'admin') {
            $request->validate([
                'judul' => 'required|max:85',
                'file' => 'required|mimes:jpeg,jpg,png|max:3072',
                'keterangan' => 'required|max:100',
                'status' => 'required|in:0,1'
            ]);

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('images/headerslide', $fileName);

            $header = new Headerslide;
            $header->judul = $request->judul;
            $header->file = $fileName;
            $header->keterangan = $request->keterangan;
            $header->status = $request->status;
            $header->save();

            return response()->json([
                'message' => "Data Headerslide Added Successfully!",
                'Added Headerslide' => $header
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function update(Request $request, $id)
    {
        $this->counter('Headerslide');

        $header = Headerslide::find($id);
        $user = Auth::user();

        if ($user->role == 'admin') {
            $request->validate([
                'judul' => 'required|max:85',
                'file' => 'required|mimes:jpeg,jpg,png|max:3072',
                'keterangan' => 'required|max:100',
                'status' => 'required|in:0,1'
            ]);

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('images/headerslide', $fileName);

            $destination = 'images/headerslide/' . $header->file;
            if ($destination) {
                Storage::delete($destination);
            }
            
            $header->update([
                'judul' => $request->judul,
                'file' => $fileName,
                'keterangan' => $request->keterangan,
                'status' => $request->status
            ]);

            return response()->json([
                'message' => "Data Headerslide Updated Successfully!",
                'Updated Headerslide' => $header
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function destroy($id)
    {
        $this->counter('Headerslide');
        
        $user = Auth::user();
        $header = Headerslide::find($id);
        $destination = 'images/headerslide/' . $header->file;

        if ($user->role == 'admin') {
            if ($destination) {
                Storage::delete($destination);
            }
            $header = Headerslide::find($id)->delete();
            return response()->json([
                'message' => "Data Headerslide Deleted Successfully!"
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
    }
}