<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Profilopd;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
                'foto_kantor' => 'required|mimes:jpeg,jpg,png|max:3072',
                'nama_kepalaopd' => 'required|max:50',
                'foto_kepalaopd' => 'required|mimes:jpeg,jpg,png|max:3072',
                'alamat' => 'required||max:100',
                'telp' => 'required|max:15',
                'email' => 'required|max:50',
                'website' => 'required|max:50',
                'twitter_widget' => 'nullable',
                'twitter_link' => 'nullable|max:100',
                'ig_widget' => 'nullable|max:100',
                'ig_link' => 'nullable',
                'facebook_widget' => 'nullable',
                'facebook_link' => 'nullable|max:100'
            ]);

            $file1 = $request->file('foto_kantor');
            $fileName1 = time() . '_' . $file1->getClientOriginalName();
            $file1->storeAs('images/opd', $fileName1);

            $file2 = $request->file('foto_kepalaopd');
            $fileName2 = time() . '_' . $file2->getClientOriginalName();
            $file2->storeAs('images/opd', $fileName2);

            $profil = new Profilopd;
            $profil->nama_opd = $request->nama_opd;
            $profil->foto_kantor = $fileName1;
            $profil->nama_kepalaopd = $request->nama_kepalaopd;
            $profil->foto_kepalaopd = $fileName2;
            $profil->alamat = $request->alamat;
            $profil->telp = $request->telp;
            $profil->email = $request->email;
            $profil->website = $request->website;
            $profil->twitter_widget = $request->twitter_widget;
            $profil->twitter_link = $request->twitter_link;
            $profil->ig_widget = $request->ig_widget;
            $profil->ig_link = $request->ig_link;
            $profil->facebook_widget = $request->facebook_widget;
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
                'foto_kantor' => 'required|mimes:jpeg,jpg,png|max:3072',
                'nama_kepalaopd' => 'required|max:50',
                'foto_kepalaopd' => 'required|mimes:jpeg,jpg,png|max:3072',
                'alamat' => 'required||max:100',
                'telp' => 'required|max:15',
                'email' => 'required|max:50',
                'website' => 'required|max:50',
                'twitter_widget' => 'nullable',
                'twitter_link' => 'nullable|max:100',
                'ig_widget' => 'nullable',
                'ig_link' => 'nullable|max:100',
                'facebook_widget' => 'nullable',
                'facebook_link' => 'nullable|max:100'
            ]);

            $file1 = $request->file('foto_kantor');
            $fileName1 = time() . '_' . $file1->getClientOriginalName();
            $file1->storeAs('images/opd', $fileName1);

            $file2 = $request->file('foto_kepalaopd');
            $fileName2 = time() . '_' . $file2->getClientOriginalName();
            $file2->storeAs('images/opd', $fileName2);

            $destination1 = 'images/opd/' . $profil->foto_kantor;
            $destination2 = 'images/opd/' . $profil->foto_kepalaopd;

            if ($destination1) {
                Storage::delete($destination1);
            }

            if ($destination2) {
                Storage::delete($destination2);
            }

            $profil->update([
                'nama_opd' => $request->nama_opd,
                'foto_kantor' => $fileName1,
                'nama_kepalaopd' => $request->nama_kepalaopd,
                'foto_kepalaopd' => $fileName2,
                'alamat' => $request->alamat,
                'telp' => $request->telp,
                'email' => $request->email,
                'website' => $request->website,
                'twitter_widget' => $request->twitter_widget,
                'twitter_link' => $request->twitter_link,
                'ig_widget' => $request->ig_widget,
                'ig_link' => $request->ig_link,
                'facebook_widget' => $request->facebook_widget,
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
        $profil = Profilopd::find($id);
        $destination1 = 'images/opd/' . $profil->foto_kantor;
        $destination2 = 'images/opd/' . $profil->foto_kepalaopd;

        if ($user->role == 'admin') {
            if ($destination1) {
                Storage::delete($destination1);
            }
            if ($destination2) {
                Storage::delete($destination2);
            }
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
