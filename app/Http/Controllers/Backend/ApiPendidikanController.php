<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Pendidikan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class ApiPendidikanController extends Controller
{
    public function getAll()
    {
        $pendidikan = Pendidikan::all();
        return Response::json($pendidikan, 200);
    }
}
