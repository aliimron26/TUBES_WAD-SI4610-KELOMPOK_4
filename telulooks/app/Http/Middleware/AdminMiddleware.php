<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Admin;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Jika tidak ada session admin_id
        if (!session('admin_id')) {
            return redirect()->route('admin.login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        // Jika admin tidak ditemukan di database
        $admin = Admin::where('id_admin', session('admin_id'))->first();
        if (!$admin) {
            session()->forget(['admin_id', 'admin_name']);
            return redirect()->route('admin.login')
                ->with('error', 'Sesi tidak valid. Silakan login kembali.');
        }

        return $next($request);
    }
}
