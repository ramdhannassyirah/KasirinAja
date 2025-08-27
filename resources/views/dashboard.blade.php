@extends('layout.app')
@section('title', 'Dashboard')
@section('content')
    <div class="">
        @if (Auth::user()->role == 'admin')
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
                                        <h2 class="card-widget__title">Rp.
                                            {{ number_format($jumlahPendapatan, 0, ',', '.') }}</h2>
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

        @if (Auth::user()->role == 'kasir')
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-2 mb-6">
                <div class="bg-white border rounded-xl flex justify-center items-center h-40">
                    <div class="">
                        <div class="flex gap-4 items-center text-gray-100">
                            <div class="bg-blue-700 p-3 rounded-full text-gray-100">

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 lg:w-14 lg:h-14" viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.5">
                                        <path
                                            d="M4.58 8.607L2 8.454C3.849 3.704 9.158 1 14.333 2.344c5.513 1.433 8.788 6.918 7.314 12.25c-1.219 4.411-5.304 7.337-9.8 7.406" />
                                        <path stroke-dasharray=".5 3" d="M12 22C6.5 22 2 17 2 11" />
                                        <path
                                            d="M13.604 9.722c-.352-.37-1.213-1.237-2.575-.62c-1.361.615-1.577 2.596.482 2.807c.93.095 1.537-.11 2.093.47c.556.582.659 2.198-.761 2.634s-2.341-.284-2.588-.509m1.653-6.484v.79m0 6.337v.873" />
                                    </g>
                                </svg>
                            </div>
                            <div class="text-gray-100">
                                <p class="text-2xl font-semibold text-blue-600">{{ $transaksiHariIni }}</p>
                                <p class="text-gray-400">Transaksi Hari ini</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white border rounded-xl flex justify-center items-center h-40">
                    <div class="">
                        <div class="flex gap-6 items-center text-gray-100">
                            <div class="bg-blue-700 p-3 rounded-full text-gray-100 ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 lg:w-14 lg:h-14" viewBox="0 0 28 28">
                                    <path fill="currentColor"
                                        d="M18.25 16.5a.75.75 0 0 0 0 1.5h3.5a.75.75 0 0 0 0-1.5zM2.004 8.75A3.75 3.75 0 0 1 5.754 5H22.25A3.75 3.75 0 0 1 26 8.75v10.5A3.75 3.75 0 0 1 22.25 23H5.755a3.75 3.75 0 0 1-3.75-3.75zm3.75-2.25a2.25 2.25 0 0 0-2.25 2.25v.75H24.5v-.75a2.25 2.25 0 0 0-2.25-2.25zm-2.25 12.75a2.25 2.25 0 0 0 2.25 2.25H22.25a2.25 2.25 0 0 0 2.25-2.25V11H3.505z" />
                                </svg>
                            </div>
                            <div class="text-start">
                                <p class="text-2xl font-semibold text-blue-600">
                                    Rp.{{ number_format($jumlahPendapatan, 0, ',', '.') }}</p>
                                <p class="text-gray-400">Jumlah Pendapatan</p>
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
