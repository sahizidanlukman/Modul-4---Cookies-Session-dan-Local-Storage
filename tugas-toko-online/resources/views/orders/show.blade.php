@extends('layouts.app')

@section('content')
<h2>Detail Pesanan #{{ $order->id_order }}</h2>
<p><strong>Tanggal:</strong> {{ $order->tanggal_order }}</p>
<p><strong>Alamat Pengiriman:</strong> {{ $order->alamat_pengiriman }}</p>

<table class="table mt-3">
    <thead>
        <tr><th>Barang</th><th>Harga Satuan</th><th>Jumlah Beli</th><th>Subtotal</th></tr>
    </thead>
    <tbody>
        @foreach($order->details as $detail)
        <tr>
            <td>{{ $detail->product->nama_barang }}</td>
            <td>Rp {{ number_format($detail->harga_satuan, 0, ',', '.') }}</td>
            <td>{{ $detail->jumlah_beli }}</td>
            <td>Rp {{ number_format($detail->harga_satuan * $detail->jumlah_beli, 0, ',', '.') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<h4>Total: Rp {{ number_format($order->total_harga, 0, ',', '.') }}</h4>
<a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection