@extends('layout.app')

@section('title', 'Data Barang')

@section('content')
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $title }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $title }}</a></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-title">Data Barang</h4>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createBarangModal">Tambah Data</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Jenis Barang</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->nama_barang }}</td>
                                        <td>Makanan</td>
                                        <td>{{ $item->stok }}</td>
                                        <td>Rp. {{ number_format($item->harga, 0, ',', '.') }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editUserModal{{ $item->id }}">Edit <i class="fa fa-edit"></i></button>
                                            <form action="{{ route('barang.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus <i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <div class="modal fade bd-example-modal-lg" id="editUserModal{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Data Barang</h5>
                                                </div>
                                                <form method="POST" action="{{ route('barang.update', $item->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Nama Barang</label>
                                                            <input type="text" name="nama_barang" class="form-control input-default" placeholder="Nama Barang" value="{{ $item->nama_barang }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Harga Barang</label>
                                                            <input type="number" name="harga" class="form-control input-default" placeholder="Harga Barang" value="{{ $item->harga }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Stock</label>
                                                            <input type="number" name="stok" class="form-control input-default" placeholder="Stock" value="{{ $item->stok }}">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn " data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade bd-example-modal-lg" id="createBarangModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form method="POST" action="{{ route('barang.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control input-default" placeholder="Nama Barang">
                    </div>
                    <div class="form-group">
                        <label>Harga Barang</label>
                        <input type="number" name="harga" class="form-control input-default" placeholder="Harga Barang">
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <input type="number" name="stok" class="form-control input-default" placeholder="Stock">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn " data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
