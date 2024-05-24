@extends('layout.app')
@section('title', 'Dashboard')
@section('content')
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>

    @if(Auth::user()->role == 'admin')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="card card-widget">
                    <div class="card-body gradient-3">
                        <div class="media">
                            <span class="card-widget__icon"></span>
                            <div class="media-body text-center">
                                <h2 class="card-widget__title">{{ $transaksiHariIni }}</h2>
                                <h5 class="card-widget__subtitle">Transaksi Hari ini</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card card-widget">
                    <div class="card-body gradient-3">
                        <div class="media">
                            <span class="card-widget__icon"></span>
                            <div class="media-body text-center">
                                <h2 class="card-widget__title">{{ $dataBarang }}</h2>
                                <h5 class="card-widget__subtitle">Data Barang</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card card-widget">
                    <div class="card-body gradient-4">
                        <div class="media">
                            <span class="card-widget__icon"></span>
                            <div class="media-body text-center">
                                <h2 class="card-widget__title">{{ $dataTransaksi }}</h2>
                                <h5 class="card-widget__subtitle">Data Transaksi</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card card-widget">
                    <div class="card-body gradient-9">
                        <div class="media">
                            <div class="media-body text-center">
                                <h2 class="card-widget__title">Rp. {{ number_format($jumlahPendapatan, 0, ',', '.') }}</h2>
                                <h5 class="card-widget__subtitle">Jumlah Pendapatan</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Barang dengan Stok Kurang dari 10</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Jenis Barang</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $item)
                                    @if ($item->stok <= 10)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_barang }}</td>
                                        <td>{{ $item->jenisBarang->nama_jenis }}</td>
                                        <td>{{ $item->stok }}</td>
                                        <td>Rp. {{ number_format($item->harga, 0, ',', '.') }}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if(Auth::user()->role == 'kasir')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="card card-widget">
                    <div class="card-body gradient-3">
                        <div class="media">
                            <span class="card-widget__icon"></span>
                            <div class="media-body text-center">
                                <h2 class="card-widget__title">{{ $transaksiHariIni }}</h2>
                                <h5 class="card-widget__subtitle">Transaksi Hari ini</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card card-widget">
                    <div class="card-body gradient-9">
                        <div class="media">
                            <span class="card-widget__icon"></span>
                            <div class="media-body text-center">
                                <h2 class="card-widget__title">Rp. {{ number_format($jumlahPendapatan, 0, ',', '.') }}</h2>
                                <h5 class="card-widget__subtitle">Jumlah Pendapatan</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Barang dengan Stok Kurang dari 10</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Jenis Barang</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barang as $item)
                                @if ($item->stok <= 10)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td>{{ $item->jenisBarang->nama_jenis }}</td>
                                    <td>{{ $item->stok }}</td>
                                    <td>Rp. {{ number_format($item->harga, 0, ',', '.') }}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

</div>
@endsection
