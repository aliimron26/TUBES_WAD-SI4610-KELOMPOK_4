<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $messages = Contact::all();
        return view('admin.contact.index', compact('messages'));
    }

    public function show($id)
    {
        $message = Contact::findOrFail($id);
        return view('admin.contact.show', compact('message'));
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'Nama' => 'required|string|max:100',
            'subject' => 'required|string',
            'message' => 'required|string'
        ]);

        $contact = Contact::create([
            'nama_pengirim' => $validated['Nama'],
            'subjek' => $validated['subject'],
            'isi_pesan' => $validated['message'],
            'status' => 'Terkirim'
        ]);

        if ($contact) {
            return response()->json([
                'success' => true,
                'message' => 'Pesan berhasil dikirim.'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Gagal mengirim pesan. Silakan coba lagi.'
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $message = Contact::findOrFail($id);
        $message->status = $request->status;
        $message->save();

        return redirect()->route('admin.contact.index')
            ->with('success', 'Status pesan berhasil diupdate');
    }

    public function destroy($id)
    {
        $message = Contact::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.contact.index')
            ->with('success', 'Pesan berhasil dihapus');
    }
}
