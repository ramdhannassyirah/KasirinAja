@extends('layout.app')
@section('content')
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Barang</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Barang</a></li>
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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Data</button>
    </div> 
    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name Barang</th>
                                    <th>qyt</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Admin</td>
                                    <td>admin@gmail.com</td>
                                    <td>admin</td>
                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">Edit <i class="fa fa-edit"></i></a>
                                        <a href="" class="btn btn-danger btn-sm">Hapus <i class="fa fa-trash"></a>
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

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form method="POST" action="">
                
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control input-default" placeholder="Nama Barang">
                    </div>
                    <div class="form-group">
                        <label>Harga Barang</label>
                        <input type="text" class="form-control input-default" placeholder="Harga Barang">
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <input type="text" class="form-control input-default" placeholder="Stock">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
