@extends('layout.app')
@section('title', 'Transaksi')
@section('content')
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Transaksi</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Transaksi</a></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Transaksi</h4>
                        </div>
                        <hr/>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahBarang"><i class="fa fa-plus"></i> Tambah Data</button>
                        <hr/>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="transaksiTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Barang</th>
                                        <th>Stock</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Rows will be added here dynamically -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">Total Bayar</th>
                                        <td colspan="2">
                                            <input id="totalBayar" type="hidden" value="0" readonly>
                                            <span id="totalBayarDisplay">0</span>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <hr/>
                        <form action="{{ route('transaksi.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="details" id="detailsInput">
                            <input type="hidden" name="total_bayar" id="totalBayarAkhir">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_transaksi">No Transaksi</label>
                                        <input type="text" name="no_transaksi" class="form-control" placeholder="No. Transaksi" readonly value="NT-00{{ time() }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_transaksi">Tanggal Transaksi</label>
                                        <input type="text" name="tgl_transaksi" class="form-control" placeholder="Tanggal Transaksi" readonly value="{{ date('Y-m-d') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="uang_pembeli">Uang Pembeli</label>
                                        <input type="text" name="uang_pembeli" id="uangPembeli" class="form-control" placeholder="Uang Pembeli" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kembalian">Uang Kembalian</label>
                                        <input type="text" value="" id="kembalian" name="kembalian" class="form-control" placeholder="Uang Kembalian" required readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
                                <a href="/transaksi" class="btn btn-danger"><i class="fa fa-undo"></i> Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="tambahBarang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form id="barangForm">
                <div class="modal-body">
                    <select class="form-control" name="id_barang" id="barang-dropdown" required>
                        <option value="" hidden>--- Pilih Jenis ---</option>
                        @foreach($barang as $item)
                        <option value="{{ $item->id }}" data-stok="{{ $item->stok }}" data-harga="{{ $item->harga }}">{{ $item->nama_barang }}</option>
                       @endforeach
                    </select>
            
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" id="hargaInput" class="form-control" placeholder="Harga" readonly>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" id="stokInput" class="form-control" placeholder="Stok" readonly>
                    </div>

                    <div class="form-group">
                        <label>Qty</label>
                        <input type="number" id="qtyInput" class="form-control" placeholder="Qty" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    
    const barangDropdown = document.getElementById('barang-dropdown');
    const stokInput = document.getElementById('stokInput');
    const hargaInput = document.getElementById('hargaInput');
    const qtyInput = document.getElementById('qtyInput');
    const transaksiTable = document.getElementById('transaksiTable').getElementsByTagName('tbody')[0];
    const totalBayarInput = document.getElementById('totalBayar');
    const totalBayarDisplay = document.getElementById('totalBayarDisplay');
    const uangPembeli = document.getElementById('uangPembeli');
    const kembalian = document.getElementById('kembalian');
    const detailsInput = document.getElementById('detailsInput');
    const totalBayarAkhir = document.getElementById('totalBayarAkhir'); 
    let total_Bayar = 0;
    let itemCount = 0;
    let details = [];

    barangDropdown.addEventListener('change', function () {
        const selectedOption = barangDropdown.options[barangDropdown.selectedIndex];
        const stok = selectedOption.getAttribute('data-stok');
        const harga = selectedOption.getAttribute('data-harga');

        stokInput.value = stok;
        hargaInput.value = harga;
    });

    document.getElementById('barangForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const selectedOption = barangDropdown.options[barangDropdown.selectedIndex];
        const id_barang = selectedOption.value;
        const nama_barang = selectedOption.text;
        const harga = parseFloat(hargaInput.value);
        const qty = parseInt(qtyInput.value);
        const subtotal = harga * qty;

        if (!id_barang || isNaN(harga) || isNaN(qty) || qty <= 0) {
            alert('Isi semua kolom dengan benar!');
            return;
        }

        total_Bayar += subtotal;
        itemCount++;
        const row = transaksiTable.insertRow();
        row.innerHTML = `<td>${itemCount}</td><td>${nama_barang}</td><td>${stokInput.value}</td><td>${harga}</td><td>${qty}</td><td>${subtotal}</td>`;

        totalBayarInput.value = total_Bayar;
        totalBayarDisplay.textContent = total_Bayar.toLocaleString('id-ID', {
            style: 'currency',
            currency: 'IDR'
        });

        
        details.push({
            id_barang: id_barang,
            qty: qty,
            subtotal: subtotal
        });

        detailsInput.value = JSON.stringify(details);

        $('#tambahBarang').modal('hide');

        totalBayarAkhir.value = total_Bayar;

    });

    uangPembeli.addEventListener('input', function () {
        const uangPembeliValue = parseFloat(uangPembeli.value);
        const totalBayarValue = parseFloat(totalBayarInput.value);
        const kembalianValue = uangPembeliValue - totalBayarValue;
        kembalian.value = kembalianValue;

        if(isNaN(kembalianValue) || uangPembeliValue < totalBayarValue ) {
            kembalian.value = 0;
        }
    });
});
</script>
@endsection
