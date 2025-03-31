<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Pendidikan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ApiPendidikanController extends Controller
{
    public function getAll()
    {
        $pendidikan = Pendidikan::all();
        return Response::json($pendidikan, 200);
    }

    public function getPen($id)
    {
        $pendidikan = Pendidikan::find($id);
        return Response::json($pendidikan, 200);
    }

    // public function createPen(Request $request)
    // {
    //     Pendidikan::create($request->all());
    //     return response()->json([
    //         'status' => 'ok',
    //         'message' => 'Pendidikan berhasil ditambahkan!'
    //     ], 201);
    // }

    // public function createPen(Request $request)
    // {
    //     $validated = $request->validate([
    //         'nama' => 'required|string|max:255',
    //         'tingkatan' => 'required|string|max:255',
    //         'tahun_masuk' => 'required|integer|min:1900|max:2100',
    //         'tahun_keluar' => 'nullable|integer|min:1900|max:2100',
    //     ]);

    //     $pendidikan = Pendidikan::create($validated);

    //     return response()->json([
    //         'status' => 'ok',
    //         'message' => 'Pendidikan berhasil ditambahkan!',
    //         'data' => $pendidikan
    //     ], 201);
    // }

    public function createPen(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'tingkatan' => 'required|string|max:255',
            'tahun_masuk' => 'required|integer|min:1900|max:2100',
            'tahun_keluar' => 'nullable|integer|min:1900|max:2100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $validator->errors(),
            ], 422); // 422 Unprocessable Entity
        }

        $pendidikan = Pendidikan::create($validator->validated());

        return response()->json([
            'status' => 'ok',
            'message' => 'Pendidikan berhasil ditambahkan!',
            'data' => $pendidikan,
        ], 201);
    }

    public function updatePen($id, Request $request)
    {
        Pendidikan::find($id)->update($request->all());

        return response()->json([
            'status' => 'ok',
            'message' => 'Pendidikan berhasil dirubah!'
        ], 201);
    }

    public function deletePen($id)
    {
        Pendidikan::destroy($id);

        return response()->json([
            'status' => 'ok',
            'message' => 'Pendidikan berhasil dihapus!'
        ], 201);
    }
}
