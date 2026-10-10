<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang</title>
</head>
<body>
    <h1>Keranjang belanja Tanpa login</h1>
    <a href="/index">&laquo; Kembali ke daftar barang</a>

    @if (count($items) === 0)
        <p>Keranjang kosong.</p>
    @else
        @foreach ($items as $item)
            <div style="margin:12px 0">
                <strong>{{ $item['barang']->nama }}</strong><br>
                Rp {{ number_format($item['barang']->harga, 0, ',', '.') }}
                x {{ $item['jumlah'] }}
                = Rp {{ number_format($item['subtotal'], 0, ',', '.') }}

                <form method="POST" action="/keranjang/ubah/{{ $item['barang']->id }}" style="display:inline">
                    @csrf
                    <button type="submit" name="aksi" value="kurang">-</button>
                    {{ $item['jumlah'] }}
                    <button type="submit" name="aksi" value="tambah">+</button>
                </form>

                <form method="POST" action="/keranjang/hapus/{{ $item['barang']->id }}" style="display:inline">
                    @csrf
                    <button type="submit">Hapus</button>
                </form>
            </div>
        @endforeach

        <h3>Total Rp {{ number_format($total, 0, ',', '.') }}</h3>

        <form method="POST" action="/keranjang/kosongkan">
            @csrf
            <button type="submit">Kosongkan keranjang</button>
        </form>
    @endif
</body>
</html>