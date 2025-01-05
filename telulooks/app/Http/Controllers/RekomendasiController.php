<?php

namespace App\Http\Controllers;

use App\Models\Rekomendasi;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class RekomendasiController extends Controller
{
    public function index()
    {
        $rekomendasi = Rekomendasi::where('status', 'Upload')->get();
        return view('rekomendasi.index', compact('rekomendasi'));
    }

    public function show($id)
    {
        $rekomendasi = Rekomendasi::findOrFail($id);
        return view('rekomendasi.show', compact('rekomendasi'));
    }

    public function addToWishlist($id)
    {
        $rekomendasi = Rekomendasi::findOrFail($id);

        // Cek apakah sudah ada di wishlist
        $exists = Wishlist::where('id_rekomendasi', $id)->exists();

        if ($exists) {
            return response()->json([
                'success' => false,
                'message' => 'Produk sudah ada di wishlist!'
            ]);
        }

        // Tambah ke wishlist
        Wishlist::create(['id_rekomendasi' => $id]);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil ditambahkan ke wishlist.'
        ]);
    }

    public function removeFromWishlist($id)
    {
        $wishlist = Wishlist::where('id_rekomendasi', $id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil dihapus dari wishlist.'
        ]);
    }

    public function wishlist()
    {
        $wishlists = Wishlist::with('rekomendasi')->get();
        return view('rekomendasi.wishlist', compact('wishlists'));
    }
}
