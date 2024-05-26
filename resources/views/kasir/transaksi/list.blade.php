@extends('layout.app')
@section('title', 'Transaksi')
@section('content')
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
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
                            <h4 class="card-title">Data Transaksi</h4>
                            <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Tambah Data</a>
                        </div>
                        <hr/>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Transaksi</th>
                                        <th>Tanggal</th>
                                        <th>Total Bayar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transaksi as $index => $trx)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $trx->no_transaksi }}</td>
                                        <td>{{ $trx->tgl_transaksi }}</td>
                                        <td>Rp. {{number_format( $trx->total_bayar, 0, ',', '.')}}</td>
                                        <td>
                                            <a href="{{ route('cetakTransaksi', $trx->no_transaksi) }}" class="btn btn-success btn-sm" target="_blank" >Detail <i class="fa fa-eye"></i></a>
                                            <form action="" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-primary btn-sm">Cetak <i class="fa fa-print"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
