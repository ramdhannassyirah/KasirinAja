@extends('layout.app')
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
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Barang</th>
                                        <th>Stock</th>
                                        <th>Harga</th>
                                        <th>Qyt</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>No</td>
                                        <td>Barang</td>
                                        <td>Stock</td>
                                        <td>Harga</td>
                                        <td>Qyt</td>
                                        <td>Subtotal</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">Total Bayar</td>
                                        <td>Total Bayar</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr/>
                        <form action="{{ route('transaksi.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_transaksi">No Transaksi</label>
                                        <input type="text" name="no_transaksi" class="form-control" placeholder="No. Transaksi" readonly value="NT-001">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_transaksi">Tanggal Transaksi</label>
                                        <input type="text" name="tgl_transaksi" class="form-control" placeholder="Tanggal Transaksi" readonly value="{{ date('Y-m-d H:i:s') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="uang_pembeli">Uang Pembeli</label>
                                        <input type="text" name="uang_pembeli" class="form-control" placeholder="Uang Pembeli" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kembalian">Uang Kembalian</label>
                                        <input type="text" value="" name="kembalian" class="form-control" placeholder="Uang Kembalian" required readonly>
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
            <form method="POST" action="{{ route('transaksi.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Jenis Barang</label>
                        <select class="form-control" name="id_barang" required>
                            <option value="" hidden>--- Pilih Jenis ---</option>
                            @foreach($barang as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Qyt</label>
                        <input type="number" name="qyt" class="form-control" placeholder="Qyt" required>
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
@endsection
