<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class UploadController extends Controller
{
    public function upload(): View
    {
        return view('uploadGambar.upload');
    }

    public function resize_upload(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'file' => 'required|image',
            'keterangan' => 'required',
        ]);

        // Tentukan path lokasi upload
        $path = public_path('data_file');

        // Jika folder belum ada, buat foldernya
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        // Ambil file dari request
        $file = $request->file('file');
        $fileName = 'logo_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // Inisialisasi ImageManager (v3 tidak pakai facade)
        $manager = new ImageManager(new GdDriver());

        // Buat canvas 200x200
        $canvas = $manager->create(200, 200);

        // Resize gambar dengan mempertahankan aspek rasio
        $resizeImage = $manager->read($file)->scale(height: 200);

        // Masukkan gambar ke dalam canvas
        $canvas->place($resizeImage, 'center');

        // Simpan gambar
        $canvas->save($path . '/' . $fileName);

        return redirect(route('upload'))->with('success', 'Data berhasil ditambahkan!');
    }

    public function dropzone()
    {
        return view('uploadGambar.dropzone');
    }

    public function dropzone_store(Request $request)
    {
        $image = $request->file('file');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('img/dropzone'), $imageName);
        return response()->json(['success' => $imageName]);
    }

    public function pdf_upload()
    {
        return view('uploadGambar.pdf_upload');
    }

    public function pdf_store(Request $request)
    {
        $pdf = $request->file('file');
        $pdfName = 'pdf_' . time() . '.' . $pdf->extension();
        $pdf->move(public_path('pdf/dropzone'), $pdfName);
        return response()->json(['success' => $pdfName]);
    }
}
