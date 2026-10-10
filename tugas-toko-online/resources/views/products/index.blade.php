@extends('layouts.app')

@section('content')
<h2 class="mb-4">Daftar Barang</h2>
<div class="row">
    @foreach($products as $product)
    <div class="col-md-3 mb-4">
        <div class="card h-100">
            <!-- Menampilkan Gambar Produk Secara Dinamis -->
            <img src="{{ asset('images/' . $product->gambar) }}" 
                 class="card-img-top" 
                 alt="{{ $product->nama_barang }}" 
                 style="height: 180px; object-fit: cover;">

            <div class="card-body">
                <h5 class="card-title">{{ $product->nama_barang }}</h5>
                <p class="card-text text-muted small">{{ $product->deskripsi }}</p>
                <p class="card-text fw-bold text-primary">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                <p class="card-text"><small class="text-muted">Stok: {{ $product->stok }}</small></p>
                
                @if($product->stok > 0)
                    <form action="{{ route('cart.add', $product->id_barang) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100">Tambah ke Keranjang</button>
                    </form>
                @else
                    <button class="btn btn-secondary w-100" disabled>Stok Habis</button>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection