<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Aktor;
use Illuminate\Http\Request;

class AktorController extends Controller
{
    public function index()
    {
        $aktor = Aktor::latest()->get();
        $respons = [
            'success' => true,
            'message' => 'Daftar aktor',
            'data' => $aktor,
        ];
        return response()->json($respons, 200);
    }

    public function store(Request $request)
    {
        $aktor = new Aktor();
        $aktor->nama_aktor = $request->nama_aktor;
        $aktor->biodata = $request->biodata;
        $aktor->save();
        return response()->json([
            'sunccess' => true,
            'message' => 'data berhasil disimpan',
        ],201);
    }

    public function show($id)
    {
        $aktor = Aktor::find($id);
        if($aktor){
            $aktor->nama_aktor = $request->nama_aktor;
            $aktor->biodata = $request->biodata;
            $aktor->save();
            return response()->json([
                'success' => true,
                'message' => 'detail kategori disimpan',
                'data' => $aktor,
            ],200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data tidak ditemukan',
            ],404);
        }
    }

    public function update(Request $request,$id)
    {
        $aktor = Aktor::find($id);
        if($aktor){
            $aktor->nama_aktor = $request->nama_aktor;
            $aktor->biodata = $request->biodata;
            $aktor->save();
            return response()->json([
                'success' => true,
                'message' => 'data berhasil diperbarui',
                'data' => $aktor,
            ],200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data tidak ditemukan',
            ],404);
        }
    }

    public function destroy($id)
    {
        $aktor = Aktor::find($id);
        if ($aktor){
            $aktor->delete();
            return response()->json([
                'success' => true,
                'message' => 'data' . $aktor->nama_aktor . 'berhasil di hapus',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data tidak ditemukan',
            ],404);
        }
    }
}
