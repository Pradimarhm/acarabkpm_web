<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pendidikan;
use Illuminate\Support\Facades\DB;

class PendidikanController extends Controller
{
    public function index(){
        $pendidikan = Pendidikan::get(); // Ambil semua data dari tabel
        return view('backend.pendidikan.index', compact('pendidikan'));
    }

    public function create(){
        $pendidikan = Pendidikan::all();
        return view('backend.pendidikan.create',compact('pendidikan'));
    }

    public function store(Request $request){
        Pendidikan::create($request->all());
        // DB::table('pengalaman_kerja')->insert([
        //     'nama' => $request->nama,
        //     'tingkatan' => $request->tingkatan,
        //     'tahun_masuk' => $request->tahun_masuk,
        //     'tahun_keluar' => $request->tahun_keluar
        // ]);

        return redirect()->route('pendidikan.index')->with('success','Data Pendidikan baru telah berhasil ditambah');
    }
}
