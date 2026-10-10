<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Keranjang belanja kamu kosong!');
        }

        DB::transaction(function () use ($cart) {
            $totalHarga = 0;
            foreach ($cart as $item) {
                $totalHarga += $item['harga'] * $item['quantity'];
            }

            $orderId = 'ORD' . time();

            // 1. Buat Data Pesanan
            Order::create([
                'id_order' => $orderId,
                'id_user' => Auth::user()->id_user,
                'tanggal_order' => now(),
                'total_harga' => $totalHarga,
                'alamat_pengiriman' => Auth::user()->alamat,
            ]);

            // 2. Simpan Detail Barang & Pengurangan Stok
            foreach ($cart as $idBarang => $item) {
                OrderDetail::create([
                    'id_order' => $orderId,
                    'id_barang' => $idBarang,
                    'harga_satuan' => $item['harga'],
                    'jumlah_beli' => $item['quantity'],
                ]);

                // Kurangi stok barang
                $product = Product::find($idBarang);
                $product->stok -= $item['quantity'];
                $product->save();
            }

            // 3. Mengosongkan Keranjang
            session()->forget('cart');
        });

        return redirect()->route('orders.index')->with('success', 'Checkout berhasil! Pesanan diproses.');
    }

    public function index()
    {
        $orders = Order::where('id_user', Auth::user()->id_user)->orderBy('tanggal_order', 'desc')->get();
        return view('orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::where('id_order', $id)->where('id_user', Auth::user()->id_user)->with('details.product')->firstOrFail();
        return view('orders.show', compact('order'));
    }
}