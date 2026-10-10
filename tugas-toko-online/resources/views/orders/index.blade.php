@extends('layouts.app')

@section('content')
<h2>Riwayat Pesanan</h2>
<table class="table">
    <thead>
        <tr><th>ID Order</th><th>Tanggal</th><th>Total Harga</th><th>Alamat Kirim</th><th>Aksi</th></tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->id_order }}</td>
            <td>{{ $order->tanggal_order }}</td>
            <td>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
            <td>{{ $order->alamat_pengiriman }}</td>
            <td><a href="{{ route('orders.show', $order->id_order) }}" class="btn btn-sm btn-info text-white">Detail</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection