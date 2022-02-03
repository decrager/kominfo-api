<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Profilopd;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfilopdController extends Controller
{
    public function view()
    {
        $profil = Profilopd::orderBy('id', 'ASC')->get();
        return response()->json([
            'message' => "Data Profilopd Loaded Successfully!",
            'Profilopd' => $profil
        ], Response::HTTP_OK);
    }

    public function viewById($id)
    {
        $profil = Profilopd::find($id);
        return response()->json([
            'message' => "Data Profilopd Loaded Successfully!",
            'Profilopd' => $profil
        ], Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama_opd' => 'required|max:50',
            'foto_kantor' => 'required|max:50',
            'nama_kepalaopd' => 'required|max:50',
            'foto_kepalaopd' => 'required|max:50',
            'alamat' => 'required||max:100',
            'telp' => 'required|max:15',
            'email' => 'required|max:50',
            'website' => 'required|max:50',
            'twitter_alamat' => 'required|max:50',
            'twitter_link' => 'required|max:50',
            'ig_alamat' => 'required|max:50',
            'ig_link' => 'required|max:50',
            'facebook_alamat' => 'required|max:50',
            'facebook_link' => 'required|max:50'
        ]);

        $user = Auth::user();

        if ($user->role == 'admin') {
            $profil = new Profilopd;
            $profil->nama_opd = $request->nama_opd;
            $profil->foto_kantor = $request->foto_kantor;
            $profil->nama_kepalaopd = $request->nama_kepalaopd;
            $profil->foto_kepalaopd = $request->foto_kepalaopd;
            $profil->alamat = $request->alamat;
            $profil->telp = $request->telp;
            $profil->email = $request->email;
            $profil->website = $request->website;
            $profil->twitter_alamat = $request->twitter_alamat;
            $profil->twitter_link = $request->twitter_link;
            $profil->ig_alamat = $request->ig_alamat;
            $profil->ig_link = $request->ig_link;
            $profil->facebook_alamat = $request->facebook_alamat;
            $profil->facebook_link = $request->facebook_link;
            $profil->save();

            return response()->json([
                'message' => "Data Profilopd Added Successfully!",
                'Added Profilopd' => $profil
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function update(Request $request, $id)
    {
        $profil = Profilopd::find($id);
        $user = Auth::user();

        $request->validate([
            'nama_opd' => 'required|max:50',
            'foto_kantor' => 'required|max:50',
            'nama_kepalaopd' => 'required|max:50',
            'foto_kepalaopd' => 'required|max:50',
            'alamat' => 'required||max:100',
            'telp' => 'required|max:15',
            'email' => 'required|max:50',
            'website' => 'required|max:50',
            'twitter_alamat' => 'required|max:50',
            'twitter_link' => 'required|max:50',
            'ig_alamat' => 'required|max:50',
            'ig_link' => 'required|max:50',
            'facebook_alamat' => 'required|max:50',
            'facebook_link' => 'required|max:50'
        ]);

        if ($user->role == 'admin') {
            $profil->update([
                'nama_opd' => $request->nama_opd,
                'foto_kantor' => $request->foto_kantor,
                'nama_kepalaopd' => $request->nama_kepalaopd,
                'foto_kepalaopd' => $request->foto_kepalaopd,
                'alamat' => $request->alamat,
                'telp' => $request->telp,
                'email' => $request->email,
                'website' => $request->website,
                'twitter_alamat' => $request->twitter_alamat,
                'twitter_link' => $request->twitter_link,
                'ig_alamat' => $request->ig_alamat,
                'ig_link' => $request->ig_link,
                'facebook_alamat' => $request->facebook_alamat,
                'facebook_link' => $request->facebook_link
            ]);

            return response()->json([
                'message' => "Data Profilopd Updated Successfully!",
                'Updated Profilopd' => $profil
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
            $profil = Profilopd::find($id)->delete();
            return response()->json([
                'message' => "Data Profilopd Deleted Successfully!"
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
    }
}
