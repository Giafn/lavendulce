<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductLog;
use Illuminate\Http\Request;

class ProductLogController extends Controller
{
    public function index()
    {
        $logs = ProductLog::with('product')->latest()->get();
        return view('product_logs.index', compact('logs'));
    }

    public function create()
    {
        $products = Product::all();
        return view('product_logs.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
            'date' => 'required|date',
        ]);

        $product = Product::findOrFail($request->product_id);
        
        if ($request->type == 'out' && $request->quantity > $product->stock) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi!');
        }

        ProductLog::create($request->all());

        if ($request->type == 'in') {
            $product->increment('stock', $request->quantity);
        } else {
            $product->decrement('stock', $request->quantity);
        }

        return redirect()->route('product_logs.index')->with('success', 'Log stok berhasil ditambahkan');
    }
}
