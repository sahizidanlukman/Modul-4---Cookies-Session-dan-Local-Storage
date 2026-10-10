<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($product->stok <= 0) {
            return redirect()->back()->with('error', 'Stok barang habis!');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] + 1 > $product->stok) {
                return redirect()->back()->with('error', 'Jumlah beli melebihi stok yang tersedia!');
            }
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "nama_barang" => $product->nama_barang,
                "quantity" => 1,
                "harga" => $product->harga,
                "gambar" => $product->gambar,
                "stok" => $product->stok
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Barang berhasil ditambahkan ke keranjang!');
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $request->validate(['quantity' => 'required|numeric|min:1']);

        if ($request->quantity > $product->stok) {
            return redirect()->back()->with('error', 'Jumlah beli melebihi stok yang tersedia!');
        }

        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Keranjang berhasil diperbarui!');
    }

    public function remove($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Barang berhasil dihapus dari keranjang!');
    }
}