<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $genre = Genre::latest()->get();
        $response = [
            'succes' => true,
            'message' => 'Daftar genre',
            'data' => $genre,
        ];

        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $genre = new Genre();
        $genre->nama_genre = $request->nama_genre;
        $genre->save();
        return response()->json([
            'succes' => true,
            'message' => 'data berhasil disimpan',
        ], 201);
    }

    public function show($id)
    {
        $genre = Genre::find($id);
        if ($genre) {
            return response()->json([
                'succes' => true,
                'message' => 'data berhasil disimpan',
                'data' => $genre,
            ], 200);
        } else {
            return response()->json([
                'succes' => true,
                'message' => 'data berhasil disimpan',
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);
        if ($genre) {
            $genre->nama_genre = $request->nama_genre;
            $genre->save();
            return response()->json([
                'succes' => true,
                'message' => 'data berhasil diperbarui',
            ], 200);
        } else {
            return response()->json([
                'succes' => false,
                'message' => 'data berhasil ditemukan',
            ], 404);
        }
    }

    public function destroy($id)
    {
        $genre = Genre::find($id);
        if ($genre) {
            $genre->delete();
            return response()->json([
                'succes' => true,
                'message' => 'data' . $genre->nama_genre . 'berhasil dihapus',
            ], 200);
        } else {
            return response()->json([
                'succes' => false,
                'message' => 'data tidak ditemukan',
            ], 404);
        }
    }
}
