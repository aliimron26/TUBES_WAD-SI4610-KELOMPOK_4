<?php

namespace App\Http\Controllers;

use App\Models\Rekomendasi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $rekomendasi = Rekomendasi::where('status', 'Upload')->get();
        return view('home', compact('rekomendasi'));
    }
}
