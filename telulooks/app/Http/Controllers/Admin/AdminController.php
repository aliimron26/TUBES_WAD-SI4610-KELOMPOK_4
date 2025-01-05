<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rekomendasi;
use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function dashboard()
    // {
    //     $totalUsers = User::count();
    //     $totalRekomendasi = Rekomendasi::count();
    //     $totalArticles = Article::count();

    //     return view('admin.dashboard', compact('totalUsers', 'totalRekomendasi', 'totalArticles'));
    // }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function listUsers()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function listRekomendasi()
    {
        $rekomendasi = Rekomendasi::where('status', 'Upload')->get();
        return view('admin.rekomendasi.index', compact('rekomendasi'));
    }

    public function createRekomendasi()
    {
        return view('admin.rekomendasi.create');
    }

    public function storeRekomendasi(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required|array',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link_shopee' => 'nullable|url',
            'link_tokopedia' => 'nullable|url',
            'link_lazada' => 'nullable|url',
        ]);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/rekomendasi', $imageName);

            Rekomendasi::create([
                'nama_fashion' => $validated['nama'],
                'deskripsi_fashion' => $validated['deskripsi'],
                'harga' => $validated['harga'],
                'kategori' => implode(', ', $validated['kategori']),
                'link_affiliate_shopee' => $validated['link_shopee'],
                'link_affiliate_tokopedia' => $validated['link_tokopedia'],
                'link_affiliate_lazada' => $validated['link_lazada'],
                'image' => $imageName,
                'status' => 'Upload'
            ]);

            return redirect()->route('admin.rekomendasi.index')
                ->with('success', 'Rekomendasi berhasil ditambahkan');
        }

        return back()->with('error', 'Gagal mengupload gambar');
    }

    public function deleteRekomendasi($id)
    {
        $rekomendasi = Rekomendasi::findOrFail($id);
        $rekomendasi->delete();

        return redirect()->route('admin.rekomendasi.index')
            ->with('success', 'Rekomendasi berhasil dihapus');
    }

    public function updateRekomendasi($id)
    {
        $rekomendasi = Rekomendasi::findOrFail($id);
        return view('admin.rekomendasi.edit', compact('rekomendasi'));
    }

    public function saveUpdateRekomendasi(Request $request, $id)
    {
        $rekomendasi = Rekomendasi::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required|array',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link_shopee' => 'nullable|url',
            'link_tokopedia' => 'nullable|url',
            'link_lazada' => 'nullable|url',
        ]);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/rekomendasi', $imageName);
            $rekomendasi->image = $imageName;
        }

        $rekomendasi->update([
            'nama_fashion' => $validated['nama'],
            'deskripsi_fashion' => $validated['deskripsi'],
            'harga' => $validated['harga'],
            'kategori' => implode(', ', $validated['kategori']),
            'link_affiliate_shopee' => $validated['link_shopee'],
            'link_affiliate_tokopedia' => $validated['link_tokopedia'],
            'link_affiliate_lazada' => $validated['link_lazada'],
        ]);

        return redirect()->route('admin.rekomendasi.index')
            ->with('success', 'Rekomendasi berhasil diupdate');
    }
}
