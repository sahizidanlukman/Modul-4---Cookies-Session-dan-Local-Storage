@extends('layouts.app')

@section('content')
<h2>Keranjang Belanja</h2>
@if(count($cart) > 0)
    <table class="table align-middle">
        <thead>
            <tr>
                <th>Barang</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($cart as $id => $item)
                @php $subtotal = $item['harga'] * $item['quantity']; $total += $subtotal; @endphp
                <tr>
                    <td>{{ $item['nama_barang'] }}</td>
                    <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex">
                            @csrf
                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" max="{{ $item['stok'] }}" class="form-control w-50 me-2">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">Update</button>
                        </form>
                    </td>
                    <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-between align-items-center mt-4">
        <h4>Total Harga: Rp {{ number_format($total, 0, ',', '.') }}</h4>
        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success btn-lg">Checkout Sekarang</button>
        </form>
    </div>
@else
    <p>Keranjang kamu masih kosong.</p>
@endif
@endsection