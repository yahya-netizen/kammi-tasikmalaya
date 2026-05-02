<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KontakController extends Controller
{
    public function index()
    {
        return view('kontak.index');
    }

    public function kirim(Request $request)
    {
        $validated = $request->validate([
            'nama'   => 'required|string|max:255',
            'email'  => 'required|email|max:255',
            'no_hp'  => 'nullable|string|max:20',
            'subjek' => 'required|string|max:255',
            'pesan'  => 'required|string|max:2000',
        ]);

        $kontak = Kontak::create($validated);

        // 1. Kirim Email ke Admin
        try {
            Mail::to('kammidaerahtasikmalaya@gmail.com')->send(new ContactFormMail($validated));
        } catch (\Exception $e) {
            // Silently fail or log the error
        }

        // 2. Redirect ke WhatsApp
        $wa_number = '62895365526034';
        $wa_hp = $validated['no_hp'] ?? '-';
        $wa_text = "*Pesan Baru dari Website KAMMI Tasikmalaya*\n\n"
                 . "*Nama:* {$validated['nama']}\n"
                 . "*Email:* {$validated['email']}\n"
                 . "*No. HP:* {$wa_hp}\n"
                 . "*Subjek:* {$validated['subjek']}\n\n"
                 . "*Pesan:*\n{$validated['pesan']}";

        $wa_url = "https://wa.me/{$wa_number}?text=" . urlencode($wa_text);

        return redirect()->away($wa_url);
    }
}