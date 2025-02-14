<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function index()
    {
        $socialMedias = SocialMedia::all();
        // jika gaada data social media
        if ($socialMedias->isEmpty()) {
            SocialMedia::create([
                'platform' => 'instagram',
                'url' => 'https://www.instagram.com/',
            ]);
            SocialMedia::create([
                'platform' => 'facebook',
                'url' => 'https://www.facebook.com/',
            ]);
        }
        return view('social_medias.index', compact('socialMedias'));
    }

    public function create()
    {
        return view('social_medias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'platform' => 'required|string|max:50',
            'url' => 'required|url',
        ]);

        SocialMedia::create($request->all());
        return redirect()->route('social_medias.index')->with('success', 'Media sosial berhasil ditambahkan');
    }

    public function edit(SocialMedia $socialMedia)
    {
        return view('social_medias.edit', compact('socialMedia'));
    }

    public function update(Request $request, SocialMedia $socialMedia)
    {
        $request->validate([
            'url' => 'required|url',
        ]);

        $socialMedia->update($request->all());
        return redirect()->route('social_medias.index')->with('success', 'Media sosial berhasil diperbarui');
    }

    // public function destroy(SocialMedia $socialMedia)
    // {
    //     $socialMedia->delete();
    //     return redirect()->route('social_medias.index')->with('success', 'Media sosial berhasil dihapus');
    // }
}
