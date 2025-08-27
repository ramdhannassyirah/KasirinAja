@extends('layout.app')
@section('title', 'Data Jenis Barang')
@section('content')
    <div class="">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="card-title">Data Jenis Barang</h4>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#createJenisBarangModal">Tambah Data</button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Barang</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($JenisBarang as $key => $jenis)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $jenis->nama_jenis }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#editBarangModal{{ $jenis->id }}">Edit <i
                                                            class="fa fa-edit"></i></button>
                                                    <form action="{{ route('JenisBarang.destroy', $jenis->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Hapus <i
                                                                class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="editBarangModal{{ $jenis->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Jenis Barang</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <form method="POST"
                                                            action="{{ route('JenisBarang.update', $jenis->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label>Nama Jenis Barang</label>
                                                                    <input type="text" name="nama_jenis"
                                                                        class="form-control input-default"
                                                                        placeholder="Nama Jenis Barang"
                                                                        value="{{ $jenis->nama_jenis }}">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Submit</button>
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
    <div class="modal fade bd-example-modal-lg" id="createJenisBarangModal" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Jenis Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form method="POST" action="{{ route('JenisBarang.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Jenis Barang</label>
                            <input type="text" name="nama_jenis" class="form-control input-default"
                                placeholder="Jenis Barang">
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
