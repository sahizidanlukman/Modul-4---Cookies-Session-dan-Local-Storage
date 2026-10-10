<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        $jumlahItem = array_sum(session('keranjang', []));

        return view('index', compact('barang', 'jumlahItem'));
    }

    public function keranjang()
    {
        $keranjang = session('keranjang', []);
        $barang = Barang::whereIn('id', array_keys($keranjang))->get()->keyBy('id');

        $items = [];
        $total = 0;

        foreach ($keranjang as $id => $jumlah) {
            if (!isset($barang[$id])) {
                continue;
            }
            $subtotal = $barang[$id]->harga * $jumlah;
            $total += $subtotal;
            $items[] = [
                'barang' => $barang[$id],
                'jumlah' => $jumlah,
                'subtotal' => $subtotal,
            ];
        }

        return view('keranjang', compact('items', 'total'));
    }

    public function tambah($id)
    {
        $barang = Barang::findOrFail($id);
        $keranjang = session('keranjang', []);
        $sekarang = $keranjang[$id] ?? 0;

        if ($sekarang < $barang->stok) {
            $keranjang[$id] = $sekarang + 1;
            session(['keranjang' => $keranjang]);
        }

        return back();
    }

    public function ubah(Request $request, $id)
    {
        $keranjang = session('keranjang', []);

        if (isset($keranjang[$id])) {
            if ($request->input('aksi') === 'tambah') {
                $barang = Barang::findOrFail($id);
                if ($keranjang[$id] < $barang->stok) {
                    $keranjang[$id]++;
                }
            } elseif ($request->input('aksi') === 'kurang') {
                $keranjang[$id]--;
                if ($keranjang[$id] <= 0) {
                    unset($keranjang[$id]);
                }
            }
            session(['keranjang' => $keranjang]);
        }

        return back();
    }

    public function hapus($id)
    {
        $keranjang = session('keranjang', []);
        unset($keranjang[$id]);
        session(['keranjang' => $keranjang]);

        return back();
    }

    public function kosongkan()
    {
        session()->forget('keranjang');

        return back();
    }
}