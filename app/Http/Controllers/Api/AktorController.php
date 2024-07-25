<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aktor;

class AktorController extends Controller
{
    public function index()
    {
        $aktor = Aktor::latest()->get();
        $response = [
            'succes' => true,
            'message' => 'Daftar aktor',
            'data' => $aktor,
        ];

        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $aktor = new Aktor();
        $aktor->nama_aktor = $request->nama_aktor;
        $aktor->bio = $request->bio;
        $aktor->save();
        return response()->json([
            'succes' => true,
            'message' => 'data berhasil disimpan',
        ], 201);
    }

    public function show($id)
    {
        $aktor = Aktor::find($id);
        if ($aktor) {
            return response()->json([
                'succes' => true,
                'message' => 'data berhasil disimpan',
                'data' => $aktor,
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
        $aktor = Aktor::find($id);
        if ($aktor) {
            $aktor->nama_aktor = $request->nama_aktor;
            $aktor->bio = $request->bio;
            $aktor->save();
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
        $aktor = Aktor::find($id);
        if ($aktor) {
            $aktor->delete();
            return response()->json([
                'succes' => true,
                'message' => 'data' . $aktor->nama_aktor . 'berhasil dihapus',
            ], 200);
        } else {
            return response()->json([
                'succes' => false,
                'message' => 'data tidak ditemukan',
            ], 404);
        }
    }
}
