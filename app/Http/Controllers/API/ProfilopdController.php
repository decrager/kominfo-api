<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Profilopd;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();

        if ($user->role == 'admin') {
            $request->validate([
                'nama_opd' => 'required|max:50',
                'foto_kantor' => 'required|mimes:jpeg,jpg,png|max:5000',
                'nama_kepalaopd' => 'required|max:5000',
                'foto_kepalaopd' => 'required|mimes:jpeg,jpg,png|max:5000',
                'alamat' => 'required||max:100',
                'telp' => 'required|max:15',
                'email' => 'required|max:50',
                'website' => 'required|max:50',
                'twitter_alamat' => 'nullable|max:50',
                'twitter_link' => 'nullable|max:100',
                'ig_alamat' => 'nullable|max:100',
                'ig_link' => 'nullable|max:50',
                'facebook_alamat' => 'nullable|max:50',
                'facebook_link' => 'nullable|max:100'
            ]);

            $profil = new Profilopd;
            $profil->nama_opd = $request->nama_opd;
            $profil->foto_kantor = $request->file('foto_kantor')->store('images');
            $profil->nama_kepalaopd = $request->nama_kepalaopd;
            $profil->foto_kepalaopd = $request->file('foto_kepalaopd')->store('images');
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

        if ($user->role == 'admin') {
            $request->validate([
                'nama_opd' => 'required|max:50',
                'foto_kantor' => 'required|mimes:jpeg,jpg,png|max:5000',
                'nama_kepalaopd' => 'required|max:5000',
                'foto_kepalaopd' => 'required|mimes:jpeg,jpg,png|max:5000',
                'alamat' => 'required||max:100',
                'telp' => 'required|max:15',
                'email' => 'required|max:50',
                'website' => 'required|max:50',
                'twitter_alamat' => 'nullable|max:50',
                'twitter_link' => 'nullable|max:100',
                'ig_alamat' => 'nullable|max:50',
                'ig_link' => 'nullable|max:100',
                'facebook_alamat' => 'nullable|max:50',
                'facebook_link' => 'nullable|max:100'
            ]);
            
            $profil->update([
                'nama_opd' => $request->nama_opd,
                'foto_kantor' => $request->file('foto_kantor')->store('images'),
                'nama_kepalaopd' => $request->nama_kepalaopd,
                'foto_kepalaopd' => $request->file('foto_kepalaopd')->store('images'),
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
