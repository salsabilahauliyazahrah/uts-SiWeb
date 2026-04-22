<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;

class ProductsController extends Controller
{
    //list tampilan produk
    public function index()
    {        
        $products = products::all();
        return view('dashboard', compact('products')); 
    }

    //menambah data produk.. jadi nanti form buat nambah produknya ada di halaman dashboard, barengan sambil nampilin produknya juga
    public function create()
    {
        return view('tambah');
    }

    //menyimpan produk 
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'kode_produk' => 'required|unique:products',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        products::create([
            'user_id' => auth()->id,
            'nama_produk' => $request->nama_produk,
            'kode_produk' => $request->kode_produk,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);

        return redirect()->route('dashboard')->with('success', 'Produk berhasil ditambahkan.');
    }

    //untuk melakukan edit produk, mungkin bisa langsung di halaman dashboard juga, jadi nanti pas klik edit, formnya muncul di bawah produk yang mau diedit itu, jadi kayak inline edit gitu
    public function edit($id)
    {
        $product = products::findOrFail($id);
        return view('edit', compact('product'));
    }

    //update produk
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'kode_produk' => 'required|unique:products,kode_produk,' . $id,
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
        ]); 

        $product = products::findOrFail($id);
        $product->update([
            'nama_produk' => $request->nama_produk,
            'kode_produk' => $request->kode_produk,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);

        return redirect()->route('dashboard')->with('success', 'Produk berhasil diperbarui.');
    }

    //hapus produk
    public function destroy($id)
    {
        $product = products::findOrFail($id);
        $product->delete(); 
        return redirect()->route('dashboard')->with('success', 'Produk berhasil dihapus.');
    }
}
