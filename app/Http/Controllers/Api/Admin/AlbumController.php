<?php

namespace App\Http\Controllers\Api\Admin;


use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    // Lấy tất cả album
    public function index()
    {
        return response()->json(Album::all(), 200);
    }

    // Tạo mới một album
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'genre' => 'nullable|string',
            'release_date' => 'nullable|date',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|string',
        ]);

        $album = Album::create($validatedData);
        return response()->json($album, 201);
    }

    // Lấy thông tin một album cụ thể
    public function show($id)
    {
        $album = Album::find($id);
        if (!$album) {
            return response()->json(['message' => 'Album not found'], 404);
        }
        return response()->json($album, 200);
    }

    // Cập nhật thông tin album
    public function update(Request $request, $id)
    {
        $album = Album::find($id);
        if (!$album) {
            return response()->json(['message' => 'Album not found'], 404);
        }

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'genre' => 'nullable|string',
            'release_date' => 'nullable|date',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|string',
        ]);

        $album->update($validatedData);
        return response()->json($album, 200);
    }

    // Xóa album
    public function destroy($id)
    {
        $album = Album::find($id);
        if (!$album) {
            return response()->json(['message' => 'Album not found'], 404);
        }
        $album->delete();
        return response()->json(['message' => 'Album deleted'], 200);
    }


}
