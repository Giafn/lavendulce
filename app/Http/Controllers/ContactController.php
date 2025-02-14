<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::first();
        if (!$contact) {
            $contact = new Contact();
            $contact->phone = '081234567890';
            $contact->email = 'admin@lavendulce.com';
            $contact->address = 'Jl. Kenangan No. 42, Kecamatan Kabupaten, Kota, Provinsi';
            $contact->save();
        }
        return view('contacts.index', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'address' => 'required|string',
        ]);

        $contact->update($request->all());
        return redirect()->route('contacts.index')->with('success', 'Kontak berhasil diperbarui');
    }
}
