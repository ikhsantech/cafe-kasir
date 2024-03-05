<body>
    <h2>Cafe In The Sky</h2>
    <h5>Jl.Juanda Cianjur Selatan</h5>
    <hr>
    {{-- <h5>No. Faktur: {{ $transaksi->id }}</h5>
    <h5>{{ $transaksi->tanggal }}</h5> --}}
    <table>
        <thead>
            <tr>
                <td>Qty</td>
                <td>Item</td>
                <td>Harga</td>
                <td>Total</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi->detail_transaksi as $item)
                <tr>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->menu->nama_menu }}</td>
                    <td>{{ number_format($item->menu->harga, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->menu->subtotal, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Total</td>
                <td>{{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
</body>
<hr>
