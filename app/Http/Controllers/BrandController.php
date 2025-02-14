<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brand = Brand::first();
        if (!$brand) {
            $brand = new Brand();
            $brand->name = 'Lavenduice';
            $brand->description = 'Indulge in Sweet Perfection';
            $brand->goals = 'At Dissert, we believe that every moment deserves a touch of sweetness. Our passion for creating exquisite desserts stems from a deep-rooted love for bringing joy through flavors. We combine traditional recipes with innovative techniques to craft desserts that not only satisfy your sweet tooth but also tell a story with every bite.';
            $brand->logo = 'brands/brand-logo.png';
            $brand->save();
        }
        return view('brands.index', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string',
            'goals' => 'required|string',
            'logo' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('brands', 'public');
        }

        $brand->update($data);
        return redirect()->route('brands.index')->with('success', 'Brand berhasil diperbarui');
    }
}
