<!DOCTYPE html>
<html>

<head>
    <title>Cetak Transaksi</title>
</head>

<body>

<div class="form-group">
   <h1 align="center">Cetak Transaksi</h1>
   @if($transaksi)
       <table align="center" class="table table-bordered">
        <thead>
            <tr>
                <td colspan="2">No Transaksi: {{$transaksi->no_transaksi}}</td>
            </tr>
            <tr>
                <td colspan="2">Tgl Transaksi: {{$transaksi->tgl_transaksi}}</td>
            </tr>
            <hr/>
            <tr>
                <th>No</th>
                <th>Barang</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
           @foreach($transaksi->detailTransaksi as $detail)
               <tr>
                   <td>{{ $loop->iteration }}</td>
                   <td>{{ $detail->barang->nama_barang }}</td>
                   <td>Rp. {{ number_format($detail->barang->harga, 0, ',', '.') }}</td>
                   <td>{{ $detail->qty }}</td>
                   <td>Rp. {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
            @endforeach
        </tbody>
        <tfoot>
            <tr align="center" class="total-row">
                <th colspan="4">Total Bayar</th>
                <th>{{ number_format($transaksi->total_bayar, 0, ',', '.') }}</th>
            </tr>
        </tfoot>
       </table>
   @else
       <p>Transaction not found.</p>
   @endif
</div>

</body>
</html>
