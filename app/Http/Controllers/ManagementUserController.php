<?php
//acara 5
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ManagementUserController extends Controller
{
    // public function index(){
    //     return "Halo deck, method ini digunakan untuk mengambil semua data user";
    // }

    // public function create(){
    //     return "Halo deck, method ini digunakan untuk menampilkan form untuk menambah data user";
    // }

    // public function store(){
    //     return "Halo deck, method ini digunakan untuk menciptakan data user terbaru";
    // }
    // public function show($id){
    //     return "Halo deck, method ini digunakan untuk mengambil satu data user dengan id=".$id;
    // }
    // public function edit($id){
    //     return "Halo deck, method ini digunakan untuk menampilkan form untuk mengubah data edit dengan id=".$id;
    // }
    // public function update(Request $request, $id){
    //     return "Halo deck, method ini digunakan untuk mengubah data user dengan id=".$id;
    // }
    // public function destroy($id){
    //     return "Halo deck, method ini digunakan untuk menghapus data user dengan id=".$id;
    // }
    

    //acara 6
    public function index()
    {
        $nama = "Praditya Ivan Rahmadhani";
        $pelajaran = ["Algoritma & pemrograman","Kalkulus","Pemrograman Web"];

        return view('home',compact('nama','pelajaran'));
    }
}

