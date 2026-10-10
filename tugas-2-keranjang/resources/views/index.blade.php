<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Toko Alat Tulis</title>
</head>
<body>
    <h1>Toko Alat Tulis</h1>
    <a href="/keranjang">Keranjang ({{ $jumlahItem }})</a>

    <h2>Daftar barang</h2>
    <ul style="list-style:none; padding:0">
        @foreach ($barang as $b)
            <li style="display:flex; align-items:center; gap:12px; margin-bottom:10px">
                @if ($b->gambar)
                    <img src="{{ asset('images/' . $b->gambar) }}"
                         alt="{{ $b->nama }}"
                         width="60" height="60"
                         style="object-fit:cover">
                @endif

                <span>
                    {{ $b->nama }} - Rp {{ number_format($b->harga, 0, ',', '.') }}
                    (stok: {{ $b->stok }})
                </span>

                <form method="POST" action="/keranjang/tambah/{{ $b->id }}" style="display:inline">
                    @csrf
                    <button type="submit" @disabled($b->stok < 1)>Masukkan ke keranjang</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>