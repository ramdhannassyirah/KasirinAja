@extends('layout.app')
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
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-3">
            <div class="card card-widget">
                <div class="card-body gradient-3">
                    <div class="media">
                        <span class="card-widget__icon"><i class="icon-home"></i></span>
                        <div class="media-body">
                            <h2 class="card-widget__title">520</h2>
                            <h5 class="card-widget__subtitle">Data Barang</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card card-widget">
                <div class="card-body gradient-4">
                    <div class="media">
                        <span class="card-widget__icon"><i class="icon-tag"></i></span>
                        <div class="media-body">
                            <h2 class="card-widget__title">720</h2>
                            <h5 class="card-widget__subtitle">Data Transaksi</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card card-widget">
                <div class="card-body gradient-4">
                    <div class="media">
                        <span class="card-widget__icon"><i class="icon-emotsmile"></i></span>
                        <div class="media-body">
                            <h2 class="card-widget__title">1002</h2>
                            <h5 class="card-widget__subtitle">Task Completed</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card card-widget">
                <div class="card-body gradient-9">
                    <div class="media">
                        <span class="card-widget__icon"><i class="icon-ghost"></i></span>
                        <div class="media-body">
                            <h2 class="card-widget__title">420</h2>
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
                    <h4 class="card-title">Data Table</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name Barang</th>
                                    <th>Jenis Barang</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Admin</td>
                                    <td>admin@gmail.com</td>
                                    <td>admin</td>
                                    <td>
                                       Rp.20,000
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           
        </div>
        </div>
    </div>
</div>
@endsection
