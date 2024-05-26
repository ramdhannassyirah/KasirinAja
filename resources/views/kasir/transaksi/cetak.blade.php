<!DOCTYPE html>
<html>

<head>
    <title>Cetak Transaksi</title>
    <style>
        /* Define CSS styles */
        body {
            font-family: Arial, sans-serif;
        }

        .form-group {
            margin: auto;
            width: 80%;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 10px; /* Add padding to create spacing */
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .total-row td {
            border: none;
            padding-top: 10px;
            font-weight: bold;
        }
    </style>
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
           <tr align="center">
               <td>{{ $loop->iteration }}</td>
               <td>{{ $detail->barang->nama_barang }}</td>
               <td>{{ number_format($detail->barang->harga, 0, ',', '.') }}</td>
               <td>{{ $detail->qty }}</td>
               <td>{{ number_format($detail->subtotal, 0, ',', '.') }}</td>
           </tr>
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

<script type="text/javascript">
    window.print();
</script>

</body>
</html>
