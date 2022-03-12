<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function view()
    {
        $banner = Banner::orderBy('id', 'ASC')->get();
        return response()->json([
            'message' => "Data Banner Loaded Successfully!",
            'Banner' => $banner
        ], Response::HTTP_OK);
    }

    public function viewById($id)
    {
        $banner = Banner::find($id);
        return response()->json([
            'message' => "Data Banner Loaded Successfully!",
            'Banner' => $banner
        ], Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $user = Auth::user();

        if ($user->role == 'admin') {
            $request->validate([
                'judul' => 'required|max:85',
                'kategori' => 'required|in:0,1',
                'file' => 'required|mimes:jpg,png,jpeg|max:3072',
                'link' => 'required|max:100',
                'status' => 'required|in:0,1'
            ]);

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('images/banner', $fileName);

            $banner = new Banner;
            $banner->judul = $request->judul;
            $banner->kategori = $request->kategori;
            $banner->file = $fileName;
            $banner->link = $request->link;
            $banner->status = $request->status;
            $banner->save();

            return response()->json([
                'message' => "Data Banner Added Successfully!",
                'Added Banner' => $banner
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::find($id);
        $user = Auth::user();

        if ($user->role == 'admin') {
            $request->validate([
                'judul' => 'required|max:85',
                'kategori' => 'required|in:0,1',
                'file' => 'required|mimes:jpg,png,jpeg|max:3072',
                'link' => 'required|max:100',
                'status' => 'required|in:0,1'
            ]);

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('images/banner', $fileName);
            
            $destination = 'images/banner/'.$banner->file;
            if ($destination) {
                Storage::delete($destination);
            }

            $banner->update([
                'judul' => $request->judul,
                'kategori' => $request->kategori,
                'file' => $fileName,
                'link' => $request->link,
                'status' => $request->status
            ]);

            return response()->json([
                'message' => "Data Banner Updated Successfully!",
                'Updated Banner' => $banner
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
        $file = Banner::find($id);
        $destination = 'images/banner/'.$file->file;

        if ($user->role == 'admin') {
            if ($destination) {
                Storage::delete($destination);
            }
            Banner::find($id)->delete();
            return response()->json([
                'message' => "Data Banner Deleted Successfully!"
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => "Unauthorized"
            ], Response::HTTP_UNAUTHORIZED);
        }
    }
}
