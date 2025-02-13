@extends('layout.app')
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">
                        <a href="/admin/barang/tambah" class="btn btn-primary">Tambah Barang</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Barang</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($barang as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_barang }}</td>
                                        <td>{{ $item->stok }}</td>
                                        <td>{{ $item->harga }}</td>
                                        <td>
                                            {{-- <a href="/admin/barang/edit/{{ $item->id }}" class="btn btn-warning">Edit</a>
                                            <a href="/admin/barang/hapus/{{ $item->id }}" class="btn btn-danger">Hapus</a> --}}
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
